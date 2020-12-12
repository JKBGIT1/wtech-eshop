<template>
  <div class="q-my-xl">
    <q-card>
      <q-card-title>Edit {{ this.productName }}</q-card-title>
      <q-card-main>
        <q-field :count="250">
          <q-input
            float-label="Názov"
            v-model="productName"
            max-length="250"
          />
        </q-field>

        <q-field :count="7">
          <q-input
            float-label="Cena"
            v-model="productPrice"
            type="number"
            max-length="7"
          />
        </q-field>

        <q-field class="q-mt-md q-mb-md">
          <q-select
            class="q-mt-sm q-mb-sm"
            v-model="productCategory"
            float-label="Kategória"
            :options="productCategories"
          />
        </q-field>

        <q-field :count="250">
          <q-input
            float-label="Materiál"
            v-model="productMaterial"
            max-length="250" />
        </q-field>

        <q-field :count="250">
          <q-input
            float-label="Info o montáži"
            v-model="productDescription"
            max-length="250" />
        </q-field>

        <q-field :count="2">
          <q-input
            float-label="Počet balení"
            type="number"
            v-model="productPacksNum"
            max-length="2" />
        </q-field>

        <q-field>
          <q-chips-input
            class="q-mb-sm"
            float-label="Farba"
            v-model="productColors" />
        </q-field>

        <q-field>
          <q-select
            class="q-mt-md q-mb-md"
            multiple
            v-model="productAdvantages"
            :options="productAdvantagesOptions"
            float-label="Výhody"
          />
        </q-field>

        <q-field>
          <div class="row no-wrap justify-between q-mt-sm">
            <q-input class="col q-mr-md" type="number" float-label="Šírka" v-model="productWidth"/>
            <q-input class="col" type="number" float-label="Dĺžka" v-model="productLength" />
            <q-input class="col q-ml-md" type="number" float-label="Výška" v-model="productHeight"/>
          </div>
        </q-field>

        <q-field align="center">
          <q-card v-for="(path, index) in this.productImages" :key="index" :id="index"
                  inline style="max-width: 400px"
                  class="q-ma-sm"
          >
            <q-card-title>
              {{ displayImageName(path) }}
            </q-card-title>
            <q-card-media>
              <img alt="Obrázok produktu" :src="path">
            </q-card-media>
            <q-card-separator />
            <q-card-actions align="right">
              <q-btn color="negative" label="Odstrániť" @click="() => deleteImage(path)" />
            </q-card-actions>
          </q-card>
        </q-field>

        <q-field helper="Vyberte obrázok" class="q-mt-lg">
          <q-uploader
            url="http://127.0.0.1:8000/products/product/image-upload"
            ref="uploader"
            hide-upload-button
            float-label="Obrázky"
            multiple extensions=".jpg"
            @finish="updateProduct"
            @uploaded="storeImagePath"
            @add="addedImage"
            @remove:cancel="removedImage"
            auto-expand
          />
        </q-field>
      </q-card-main>

      <q-card-actions class="q-mt-md">
        <div class="row justify-end full-width docs-btn">
          <q-btn label="Späť" flat to="/products/index"/>
          <q-btn label="Aktualizovať" color="primary" @click="sendImagesFirst" />
        </div>
      </q-card-actions>
    </q-card>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      countImages: 0,
      productId: '',
      productName: '',
      productPrice: '',
      productImages: [],
      productWidth: '',
      productLength: '',
      productHeight: '',
      productColors: [],
      productCategory: '',
      productPacksNum: '',
      productMaterial: '',
      productAdvantages: [],
      productDescription: '',
      productAdvantagesOptions: [
        {
          label: 'Novinka',
          value: 'new',
        },
        {
          label: 'Produkt z reklamy',
          value: 'add_product',
        },
        {
          label: 'Najpredávanejší produkt',
          value: 'best_selling',
        },
      ],
      productCategories: [
        {
          label: 'Kuchyňa',
          value: 1,
        },
        {
          label: 'Obývačka',
          value: 2,
        },
        {
          label: 'Spálňa',
          value: 3,
        },
        {
          label: 'Kúpelňa',
          value: 4,
        },
        {
          label: 'Pracovňa',
          value: 5,
        },
        {
          label: 'Záhrada',
          value: 6,
        },
      ],
    };
  },
  methods: {
    displayImageName(path) {
      const splitted = path.split('/');
      if (splitted[splitted.length - 1].includes('~')) {
        const splitByDylda = splitted[splitted.length - 1].split('~');
        return splitByDylda[splitByDylda.length - 1];
      }
      return splitted[splitted.length - 1];
    },
    setCountImages() {
      if (this.productImages) {
        this.countImages = this.productImages.length;
        if (this.productImages.length >= 4) {
          document.querySelector('.q-uploader-input').disabled = true;
        }
      }
    },
    sendImagesFirst() {
      if (this.countImages > 0 && document.querySelector('.q-uploader-file') !== null) {
        if (this.countImages >= 4) {
          document.querySelector('.q-uploader-input').disabled = true;
        }

        this.$refs.uploader.upload();
      } else {
        this.updateProduct();
      }
    },
    deleteImage(path) {
      axios
        .put('http://127.0.0.1:8000/products/remove-image', { path: path })
        .then((response) => {
          if (response.data.message === 'success') { // image was removed
            this.countImages -= 1;
            if (this.countImages < 4) { // allow adding new images
              document.querySelector('.q-uploader-input').disabled = false;
            }

            // delete removed image from this.productImages
            const newProductImages = [];
            for (let i = 0; i < this.productImages.length; i += 1) {
              if (this.productImages[i] !== path) { // Make unique images on server.
                newProductImages.push(this.productImages[i]);
              }
            }

            this.productImages = newProductImages; // replace old images with new.

            this.$q.notify({ type: 'positive', timeout: 2000, message: 'Obrázok bol odstránený.' });

            this.updateProduct(); // Image is deleted, we need to update database. Then it will show only images, which are left.
          } else {
            this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nepodarilo sa odstrániť obrázok.' });
          }
        })
        .catch((error) => {
          this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nepodarilo sa odstrániť obrázok.' });
          console.log(error);
        });
    },
    updateProduct() {
      axios
        .put(`http://127.0.0.1:${8000}/products/${this.$route.params.id}`, this.productData)
        .then(() => {
          this.$q.notify({ type: 'positive', timeout: 2000, message: 'Produkt bol aktualizovaný.' });
          this.setCountImages(); // check if button for uploading image shouldn't be disabled
        })
        .catch((error) => {
          this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nepodarilo sa aktualizovať produkt.' });
          console.log(error);
        });
    },
    storeImagePath(file, xhr) {
      const { path } = JSON.parse(xhr.response);

      if (path === 'fail') {
        this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nepodarilo sa uložiť obrázok.' });
      } else {
        this.productImages.push(path);
      }
    },
    addedImage() {
      this.countImages += 1;
      if (this.countImages === 4) {
        document.querySelector('.q-uploader-input').disabled = true;
      }
    },
    removedImage() {
      this.countImages -= 1;
      if (this.countImages < 4) {
        document.querySelector('.q-uploader-input').disabled = false;
      }
    },
  },
  mounted() {
    axios
      .get(`http://127.0.0.1:${8000}/products/${this.$route.params.id}/edit`)
      .then((response) => {
        this.productId = response.data.product.id;
        this.productName = response.data.product.name;
        this.productDescription = response.data.product.description;
        this.productPrice = response.data.product.price;
        this.productWidth = response.data.product.width;
        this.productLength = response.data.product.length;
        this.productHeight = response.data.product.height;
        this.productColors = response.data.product.colors;
        this.productCategory = response.data.product.category_id;
        this.productPacksNum = response.data.product.number_of_packs;
        this.productMaterial = response.data.product.material;
        this.productAdvantages = response.data.product.advantages;
        this.productDescription = response.data.product.description;
        if (response.data.product.images) { // sever can return images as null, because product doesn't have to have image
          this.productImages = response.data.product.images;
        }
        this.setCountImages();
      })
      .catch((error) => {
        this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nepodarilo sa načítať produkt.' });
        console.log(error);
      });
  },
  computed: {
    productData() {
      return {
        id: this.productId, // This isn't in Create.Vue
        name: this.productName,
        price: this.productPrice,
        width: this.productWidth,
        length: this.productLength,
        height: this.productHeight,
        colors: this.productColors,
        category_id: this.productCategory,
        number_of_packs: this.productPacksNum,
        material: this.productMaterial,
        advantages: this.productAdvantages,
        description: this.productDescription,
        images: this.productImages,
      };
    },
  },
};
</script>

<style scoped>
  .docs-btn .q-btn {
    padding: 15px 20px
  }
</style>
