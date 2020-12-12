<template>
  <div class="q-my-xl">
    <q-card>
      <q-card-title>Vytvoriť nový produkt</q-card-title>
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

        <q-field helper="Vyberte obrázok" class="q-mt-lg">
          <!-- need : before url maybe-->
          <q-uploader
            url="http://127.0.0.1:8000/products/product/image-upload"
            ref="uploader"
            hide-upload-button
            float-label="Obrázky"
            multiple extensions=".jpg"
            @finish="createProduct"
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
          <q-btn label="Vytvoriť" color="primary" @click="sendImagesFirst" />
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
      productName: 'AAA',
      productImages: [],
      productPrice: '1257',
      productWidth: '999',
      productLength: '888',
      productHeight: '777',
      productColors: ['cierna'],
      productCategory: 1,
      productPacksNum: '2',
      productMaterial: 'Velky',
      productAdvantages: ['new', 'add_product', 'best_selling'],
      productDescription: 'Hello there',
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
    sendImagesFirst() {
      if (this.countImages > 0) {
        this.$refs.uploader.upload();
      } else {
        this.createProduct();
      }
    },
    createProduct() {
      // Dumb way to handle ESLint error of singlequotes must be used in url.
      // This 'http://127.0.0.1:8000/products' or this `http://127.0.0.1:8000/products` didn't work
      axios
        .post(`http://127.0.0.1:${8000}/products`, this.productData)
        .then((response) => {
          this.$q.notify({ type: 'positive', timeout: 2000, message: 'Produkt bol vytvorený.' });
          this.$router.push({ path: `/products/${response.data.id}/edit` });
        })
        .catch((error) => {
          this.$q.notify({ type: 'negative', timeout: 2000, message: 'Vyskytol sa problém.' });
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
  computed: {
    productData() {
      return {
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
