(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["2c6e680e"],{2932:function(t,e,a){},"85f6":function(t,e,a){"use strict";a.r(e);var o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"q-my-xl"},[a("q-card",[a("q-card-title",[t._v("Edit "+t._s(this.productName))]),a("q-card-main",[a("q-field",{attrs:{count:250}},[a("q-input",{attrs:{"float-label":"Názov","max-length":"250"},model:{value:t.productName,callback:function(e){t.productName=e},expression:"productName"}})],1),a("q-field",{attrs:{count:7}},[a("q-input",{attrs:{"float-label":"Cena",type:"number","max-length":"7"},model:{value:t.productPrice,callback:function(e){t.productPrice=e},expression:"productPrice"}})],1),a("q-field",{staticClass:"q-mt-md q-mb-md"},[a("q-select",{staticClass:"q-mt-sm q-mb-sm",attrs:{"float-label":"Kategória",options:t.productCategories},model:{value:t.productCategory,callback:function(e){t.productCategory=e},expression:"productCategory"}})],1),a("q-field",{attrs:{count:250}},[a("q-input",{attrs:{"float-label":"Materiál","max-length":"250"},model:{value:t.productMaterial,callback:function(e){t.productMaterial=e},expression:"productMaterial"}})],1),a("q-field",{attrs:{count:250}},[a("q-input",{attrs:{"float-label":"Info o montáži","max-length":"250"},model:{value:t.productDescription,callback:function(e){t.productDescription=e},expression:"productDescription"}})],1),a("q-field",{attrs:{count:2}},[a("q-input",{attrs:{"float-label":"Počet balení",type:"number","max-length":"2"},model:{value:t.productPacksNum,callback:function(e){t.productPacksNum=e},expression:"productPacksNum"}})],1),a("q-field",[a("q-chips-input",{staticClass:"q-mb-sm",attrs:{"float-label":"Farba"},model:{value:t.productColors,callback:function(e){t.productColors=e},expression:"productColors"}})],1),a("q-field",[a("q-select",{staticClass:"q-mt-md q-mb-md",attrs:{multiple:"",options:t.productAdvantagesOptions,"float-label":"Výhody"},model:{value:t.productAdvantages,callback:function(e){t.productAdvantages=e},expression:"productAdvantages"}})],1),a("q-field",[a("div",{staticClass:"row no-wrap justify-between q-mt-sm"},[a("q-input",{staticClass:"col q-mr-md",attrs:{type:"number","float-label":"Šírka"},model:{value:t.productWidth,callback:function(e){t.productWidth=e},expression:"productWidth"}}),a("q-input",{staticClass:"col",attrs:{type:"number","float-label":"Dĺžka"},model:{value:t.productLength,callback:function(e){t.productLength=e},expression:"productLength"}}),a("q-input",{staticClass:"col q-ml-md",attrs:{type:"number","float-label":"Výška"},model:{value:t.productHeight,callback:function(e){t.productHeight=e},expression:"productHeight"}})],1)]),a("q-field",{attrs:{align:"center"}},t._l(this.productImages,function(e,o){return a("q-card",{key:o,staticClass:"q-ma-sm",staticStyle:{"max-width":"400px"},attrs:{id:o,inline:""}},[a("q-card-title",[t._v("\n            "+t._s(t.displayImageName(e))+"\n          ")]),a("q-card-media",[a("img",{attrs:{alt:"Obrázok produktu",src:e}})]),a("q-card-separator"),a("q-card-actions",{attrs:{align:"right"}},[a("q-btn",{attrs:{color:"negative",label:"Odstrániť"},on:{click:function(){return t.deleteImage(e)}}})],1)],1)})),a("q-field",{staticClass:"q-mt-lg",attrs:{helper:"Vyberte obrázok"}},[a("q-uploader",{ref:"uploader",attrs:{url:"http://127.0.0.1:8000/products/product/image-upload","hide-upload-button":"","float-label":"Obrázky",multiple:"",extensions:".jpg","auto-expand":""},on:{finish:t.updateProduct,uploaded:t.storeImagePath,add:t.addedImage,"remove:cancel":t.removedImage}})],1)],1),a("q-card-actions",{staticClass:"q-mt-md"},[a("div",{staticClass:"row justify-end full-width docs-btn"},[a("q-btn",{attrs:{label:"Späť",flat:"",to:"/products/index"}}),a("q-btn",{attrs:{label:"Aktualizovať",color:"primary"},on:{click:t.sendImagesFirst}})],1)])],1)],1)},r=[];o._withStripped=!0;a("7f7f"),a("6762"),a("2fdb"),a("28a5");var c=a("bc3a"),u=a.n(c),d={data:function(){return{countImages:0,productId:"",productName:"",productPrice:"",productImages:[],productWidth:"",productLength:"",productHeight:"",productColors:[],productCategory:"",productPacksNum:"",productMaterial:"",productAdvantages:[],productDescription:"",productAdvantagesOptions:[{label:"Novinka",value:"new"},{label:"Produkt z reklamy",value:"add_product"},{label:"Najpredávanejší produkt",value:"best_selling"}],productCategories:[{label:"Kuchyňa",value:1},{label:"Obývačka",value:2},{label:"Spálňa",value:3},{label:"Kúpelňa",value:4},{label:"Pracovňa",value:5},{label:"Záhrada",value:6}]}},methods:{displayImageName:function(t){var e=t.split("/");if(e[e.length-1].includes("~")){var a=e[e.length-1].split("~");return a[a.length-1]}return e[e.length-1]},setCountImages:function(){this.productImages&&(this.countImages=this.productImages.length,this.productImages.length>=4&&(document.querySelector(".q-uploader-input").disabled=!0))},sendImagesFirst:function(){this.countImages>0&&null!==document.querySelector(".q-uploader-file")?(this.countImages>=4&&(document.querySelector(".q-uploader-input").disabled=!0),this.$refs.uploader.upload()):this.updateProduct()},deleteImage:function(t){var e=this;u.a.put("http://127.0.0.1:8000/products/remove-image",{path:t}).then(function(a){if("success"===a.data.message){e.countImages-=1,e.countImages<4&&(document.querySelector(".q-uploader-input").disabled=!1);for(var o=[],r=0;r<e.productImages.length;r+=1)e.productImages[r]!==t&&o.push(e.productImages[r]);e.productImages=o,e.$q.notify({type:"positive",timeout:2e3,message:"Obrázok bol odstránený."}),e.updateProduct()}else e.$q.notify({type:"negative",timeout:2e3,message:"Nepodarilo sa odstrániť obrázok."})}).catch(function(t){e.$q.notify({type:"negative",timeout:2e3,message:"Nepodarilo sa odstrániť obrázok."}),console.log(t)})},updateProduct:function(){var t=this;u.a.put("http://127.0.0.1:".concat(8e3,"/products/",this.$route.params.id),this.productData).then(function(){t.$q.notify({type:"positive",timeout:2e3,message:"Produkt bol aktualizovaný."}),t.setCountImages()}).catch(function(e){t.$q.notify({type:"negative",timeout:2e3,message:"Nepodarilo sa aktualizovať produkt."}),console.log(e)})},storeImagePath:function(t,e){var a=JSON.parse(e.response),o=a.path;"fail"===o?this.$q.notify({type:"negative",timeout:2e3,message:"Nepodarilo sa uložiť obrázok."}):this.productImages.push(o)},addedImage:function(){this.countImages+=1,4===this.countImages&&(document.querySelector(".q-uploader-input").disabled=!0)},removedImage:function(){this.countImages-=1,this.countImages<4&&(document.querySelector(".q-uploader-input").disabled=!1)}},mounted:function(){var t=this;u.a.get("http://127.0.0.1:".concat(8e3,"/products/",this.$route.params.id,"/edit")).then(function(e){t.productId=e.data.product.id,t.productName=e.data.product.name,t.productDescription=e.data.product.description,t.productPrice=e.data.product.price,t.productWidth=e.data.product.width,t.productLength=e.data.product.length,t.productHeight=e.data.product.height,t.productColors=e.data.product.colors,t.productCategory=e.data.product.category_id,t.productPacksNum=e.data.product.number_of_packs,t.productMaterial=e.data.product.material,t.productAdvantages=e.data.product.advantages,t.productDescription=e.data.product.description,e.data.product.images&&(t.productImages=e.data.product.images),t.setCountImages()}).catch(function(e){t.$q.notify({type:"negative",timeout:2e3,message:"Nepodarilo sa načítať produkt."}),console.log(e)})},computed:{productData:function(){return{id:this.productId,name:this.productName,price:this.productPrice,width:this.productWidth,length:this.productLength,height:this.productHeight,colors:this.productColors,category_id:this.productCategory,number_of_packs:this.productPacksNum,material:this.productMaterial,advantages:this.productAdvantages,description:this.productDescription,images:this.productImages}}}},s=d,i=(a("e72b"),a("2877")),l=Object(i["a"])(s,o,r,!1,null,"7160085e",null);l.options.__file="Edit.vue";e["default"]=l.exports},e72b:function(t,e,a){"use strict";var o=a("2932"),r=a.n(o);r.a}}]);