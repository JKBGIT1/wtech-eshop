(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["app"],{0:function(e,n,t){e.exports=t("2f39")},"034f":function(e,n,t){"use strict";var a=t("fb1c"),r=t.n(a);r.a},"1e5d":function(e,n,t){},"2f39":function(e,n,t){"use strict";t.r(n);var a={};t.r(a),t.d(a,"updateDrawerState",function(){return $});t("ac6a"),t("a114"),t("d14b"),t("1e5d"),t("7e6d");var r=t("2b0e"),o=t("e84f"),u=t("7051"),c=t("2040"),i=t("cf12"),p=t("46a9"),f=t("32a1"),s=t("f30c"),l=t("ce67"),d=t("482e"),b=t("52b5"),h=t("1180"),m=t("1e55"),v=t("506f"),w=t("b8d9"),Q=t("7d43"),x=t("1526"),y=t("133b");r["a"].use(o["a"],{config:{},components:{QLayout:u["a"],QLayoutHeader:c["a"],QLayoutDrawer:i["a"],QPageContainer:p["a"],QPage:f["a"],QToolbar:s["a"],QToolbarTitle:l["a"],QBtn:d["a"],QIcon:b["a"],QList:h["a"],QListHeader:m["a"],QItem:v["a"],QItemMain:w["a"],QItemSide:Q["a"]},directives:{Ripple:x["a"]},plugins:{Notify:y["a"]}});var g=function(){var e=this,n=e.$createElement,t=e._self._c||n;return t("div",{attrs:{id:"q-app"}},[t("router-view")],1)},L=[];g._withStripped=!0;var S={name:"App"},V=S,I=(t("034f"),t("2877")),_=Object(I["a"])(V,g,L,!1,null,null,null);_.options.__file="App.vue";var A=_.exports,k={layout:{drawerState:!1}},T=t("af3b"),$=function(e,n){e.layout.drawerState=n},q=t("c5e7"),B={namespaced:!0,state:k,getters:T,mutations:a,actions:q};Vue.use(Vuex);var C=function(){var e=new Vuex.Store({modules:{example:example,moduleUI:B}});return e},D=t("8c4f"),E=[{path:"/",redirect:function(){return{path:"products/index"}}},{path:"/products",component:function(){return t.e("1e36bb22").then(t.bind(null,"8e31"))},children:[{path:"index",component:function(){return t.e("264519e5").then(t.bind(null,"e981"))}},{path:"create",component:function(){return t.e("cf600894").then(t.bind(null,"d5ff"))}}]},{path:"/products/:id",component:function(){return t.e("1e36bb22").then(t.bind(null,"8e31"))},children:[{path:"",component:function(){return t.e("7170c963").then(t.bind(null,"8764"))}},{path:"edit",component:function(){return t.e("c192fa1c").then(t.bind(null,"85f6"))}}]}];E.push({path:"*",component:function(){return t.e("4b47640d").then(t.bind(null,"e51e"))}});var H=E;r["a"].use(D["a"]);var J=function(){var e=new D["a"]({scrollBehavior:function(){return{y:0}},routes:H,mode:"hash",base:""});return e},P=function(){var e="function"===typeof C?C():C,n="function"===typeof J?J({store:e}):J;e.$router=n;var t={el:"#q-app",router:n,store:e,render:function(e){return e(A)}};return{app:t,store:e,router:n}},j=t("a925"),M={failed:"Action failed",success:"Action was successful"},N={"en-us":M},O=function(e){var n=e.app,t=e.Vue;t.use(j["a"]),n.i18n=new j["a"]({locale:"en-us",fallbackLocale:"en-us",messages:N})},R=t("bc3a"),U=t.n(R),z=function(e){var n=e.Vue;n.prototype.$axios=U.a},F=P(),G=F.app,K=F.store,W=F.router;[O,z].forEach(function(e){e({app:G,router:W,store:K,Vue:r["a"],ssrContext:null})}),new r["a"](G)},"7e6d":function(e,n,t){},af3b:function(e,n){},c5e7:function(e,n){},fb1c:function(e,n,t){}},[[0,"runtime","vendor"]]]);