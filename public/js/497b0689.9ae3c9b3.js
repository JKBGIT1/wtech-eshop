(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["497b0689"],{2098:function(t,e,a){"use strict";var n=a("84c7"),o=a.n(n);o.a},"84c7":function(t,e,a){},e981:function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"q-my-xl"},[a("q-table",{attrs:{data:t.serverData,"row-key":"name",pagination:t.serverPagination,loading:t.loading,columns:t.columns,title:"Zoznam produktov","binary-state-sort":""},on:{"update:pagination":function(e){t.serverPagination=e},request:t.request},scopedSlots:t._u([{key:"body",fn:function(e){return a("q-tr",{attrs:{props:e}},[a("q-td",{key:"id",attrs:{props:e}},[a("span",[t._v(t._s(e.row.id))])]),a("q-td",{key:"name",attrs:{props:e}},[a("span",[t._v(t._s(e.row.name))])]),a("q-td",{staticClass:"text-right"},["DELETED"===e.row.id?a("div",[t._v("DELETED")]):a("div",[a("q-btn",{staticClass:"q-mr-xs",attrs:{round:"",icon:"edit"},on:{click:function(a){t.$router.push("/products/"+e.row.id+"/edit")}}}),a("q-btn",{attrs:{round:"",icon:"delete"},on:{click:function(a){t.destroy(e.row.id,e.row.name,e.row.__index)}}})],1)])],1)}}])})],1)},o=[];n._withStripped=!0;var r=a("bc3a"),i=a.n(r),s={data:function(){return{columns:[{name:"id",label:"ID",field:"id",sortable:!1,align:"left"},{name:"name",label:"Name",field:"name",sortable:!0,align:"left"},{name:"actions",label:"Actions",sortable:!1,align:"right"}],serverPagination:{page:1,rowsNumber:10,rowsPerPage:5,sortBy:"name",descending:!0},loading:!1,serverData:[],selected:[]}},methods:{request:function(t){var e=this,a=t.pagination;this.loading=!0,i.a.get("http://127.0.0.1:8000/products/list/".concat(a.page,"?rowsPerPage=").concat(a.rowsPerPage,"&sortBy=").concat(a.sortBy,"&descending=").concat(a.descending)).then(function(t){var n=t.data;e.serverPagination=a,e.serverPagination.rowsNumber=n.rowsNumber,e.serverData=n.rows,e.loading=!1}).catch(function(t){console.log(t),e.loading=!1})},destroy:function(t,e,a){var n=this;this.$q.dialog({title:"Vymazať",message:"Ste si istý, že chcete vymazať ".concat(e,"?"),color:"primary",ok:!0,cancel:!0}).then(function(){i.a.delete("http://127.0.0.1:8000/products/".concat(t)).then(function(){n.serverData[a].id="DELETED",n.$q.notify({type:"positive",timeout:2e3,message:"Produkt bol úspešne vymazaný."});for(var t=[],e=0;e<n.serverData.length;e+=1)n.serverData[e].id!==n.serverData[a].id&&t.push(n.serverData[e]);n.serverData=t}).catch(function(t){n.$q.notify({type:"negative",timeout:2e3,message:"Vyskytol sa problém."}),console.log(t)})}).catch(function(){})}},mounted:function(){this.request({pagination:this.serverPagination,filter:this.filter})}},c=s,l=(a("2098"),a("2877")),d=Object(l["a"])(c,n,o,!1,null,"68a58c88",null);d.options.__file="Index.vue";e["default"]=d.exports}}]);