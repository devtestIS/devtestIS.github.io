(function(t){function e(e){for(var s,i,l=e[0],o=e[1],c=e[2],u=0,p=[];u<l.length;u++)i=l[u],Object.prototype.hasOwnProperty.call(r,i)&&r[i]&&p.push(r[i][0]),r[i]=0;for(s in o)Object.prototype.hasOwnProperty.call(o,s)&&(t[s]=o[s]);d&&d(e);while(p.length)p.shift()();return n.push.apply(n,c||[]),a()}function a(){for(var t,e=0;e<n.length;e++){for(var a=n[e],s=!0,l=1;l<a.length;l++){var o=a[l];0!==r[o]&&(s=!1)}s&&(n.splice(e--,1),t=i(i.s=a[0]))}return t}var s={},r={app:0},n=[];function i(e){if(s[e])return s[e].exports;var a=s[e]={i:e,l:!1,exports:{}};return t[e].call(a.exports,a,a.exports,i),a.l=!0,a.exports}i.m=t,i.c=s,i.d=function(t,e,a){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},i.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(i.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var s in t)i.d(a,s,function(e){return t[e]}.bind(null,s));return a},i.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="/admin/";var l=window["webpackJsonp"]=window["webpackJsonp"]||[],o=l.push.bind(l);l.push=e,l=l.slice();for(var c=0;c<l.length;c++)e(l[c]);var d=o;n.push([0,"chunk-vendors"]),a()})({0:function(t,e,a){t.exports=a("56d7")},"23b8":function(t,e,a){"use strict";var s=a("5b4f"),r=a.n(s);r.a},"3fd4":function(t,e,a){t.exports=a.p+"img/shards-dashboards-logo.60a85991.svg"},"4ee9":function(t,e,a){},"56d7":function(t,e,a){"use strict";a.r(e);a("e260"),a("e6cf"),a("cca6"),a("a79d");var s=a("a026"),r=a("90ae"),n=a("0284"),i=a.n(n),l=(a("619b"),a("7051"),a("f9e3"),a("4ee9"),a("a54d"),function(){var t=this,e=t.$createElement,a=t._self._c||e;return a(t.layout,{tag:"component"},[a("router-view")],1)}),o=[],c={computed:{layout:function(){return"".concat(this.$route.meta.layout||"default","-layout")}}},d=c,u=a("2877"),p=Object(u["a"])(d,l,o,!1,null,null,null),m=p.exports,f=a("8c4f"),b=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"main-content-container container-fluid h-100 px-4"},[a("d-row",{staticClass:"h-100",attrs:{"no-gutters":""}},[a("d-col",{staticClass:"auth-form mx-auto my-auto",attrs:{lg:"3",md:"5"}},[a("d-card",[a("d-card-body",[a("h5",{staticClass:"auth-form__title text-center mb-4"},[t._v(" Войдите или зарегистрируйтесь ")]),a("d-form",[a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"exampleInputEmail1"}},[t._v("Почта")]),a("d-input",{attrs:{id:"exampleInputEmail1",type:"email",placeholder:"Введите email"}})],1),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"exampleInputPassword1"}},[t._v("Пароль")]),a("d-input",{attrs:{id:"exampleInputPassword1",type:"password",placeholder:"Введите пароль"}})],1),a("d-button",{staticClass:"btn-accent d-table mx-auto",attrs:{pill:"",type:"submit"},on:{click:function(e){return e.preventDefault(),t.login(e)}}},[t._v(" Войти в систему ")])],1)],1),a("d-card-footer",{staticClass:"border-top d-flex justify-content-between"},[a("d-link",{attrs:{tag:"a",to:"forgot-password"}},[t._v(" Забыли пароль? ")]),a("d-link",{staticClass:"ml-auto",attrs:{tag:"a",to:"register"}},[t._v(" Регистрация ")])],1)],1)],1)],1)],1)},v=[],h=(a("a4d3"),a("4de4"),a("e439"),a("dbb4"),a("b64b"),a("159b"),a("ade3")),g=a("2f62");function _(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function y(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?_(Object(a),!0).forEach((function(e){Object(h["a"])(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):_(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var C={methods:y({},Object(g["b"])(["IS_AUTH"]),{login:function(){this.$router.push("/user-profile"),this["IS_AUTH"](!0)}})},O=C,w=Object(u["a"])(O,b,v,!1,null,null,null),x=w.exports,j=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"main-content-container container-fluid h-100 px-4"},[a("d-row",{staticClass:"h-100",attrs:{"no-gutters":""}},[a("d-col",{staticClass:"auth-form mx-auto my-auto",attrs:{lg:"3",md:"5"}},[a("d-card",[a("d-card-body",[a("h5",{staticClass:"auth-form__title text-center mb-4"},[t._v(" Регистрация ")]),a("d-form",[a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"name"}},[t._v(t._s(t.uface?"ИНН":"Имя"))]),a("d-input",{attrs:{id:"name",type:"text",placeholder:"Введите "+(t.uface?"ИНН":"Имя")}})],1),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"exampleInputEmail1"}},[t._v("Почта")]),a("d-input",{attrs:{id:"exampleInputEmail1",type:"email",placeholder:"Введите email"}})],1),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"exampleInputPassword1"}},[t._v("Пароль")]),a("d-input",{attrs:{id:"exampleInputPassword1",type:"password",placeholder:"Введите пароль"}})],1),a("div",{staticClass:"form-group mt-4 mb-3 d-table"},[a("d-checkbox",{staticClass:"custom-toggle-sm",attrs:{toggle:""},model:{value:t.uface,callback:function(e){t.uface=e},expression:"uface"}},[a("a",{attrs:{href:""}},[t._v(t._s(t.uface?"Юридическое лицо":"Физическое лицо"))])])],1),a("div",{staticClass:"form-group mb-3 d-table"},[a("d-checkbox",{attrs:{value:"agree_tc"}},[a("a",{attrs:{href:""}},[t._v("Принимаю публичную оферту")])])],1),a("d-button",{staticClass:"btn-accent d-table mx-auto",attrs:{pill:"",type:"submit"}},[t._v(" Зарегистрироваться ")])],1)],1)],1)],1)],1)],1)},P=[],k={data:function(){return{uface:!1}}},E=k,S=Object(u["a"])(E,j,P,!1,null,null,null),$=S.exports,A=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"main-content-container container-fluid h-100 px-4"},[a("d-row",{staticClass:"h-100",attrs:{"no-gutters":""}},[a("d-col",{staticClass:"auth-form mx-auto my-auto",attrs:{lg:"3",md:"5"}},[a("d-card",[a("d-card-body",[a("h5",{staticClass:"auth-form__title text-center mb-4"},[t._v(" Сбросить пароль ")]),a("d-form",[a("div",{staticClass:"form-group mb-4"},[a("label",{attrs:{for:"exampleInputEmail1"}},[t._v("Ваш email")]),a("d-input",{attrs:{id:"exampleInputEmail1",type:"email",placeholder:"Введите email"}}),a("d-form-text",{staticClass:"text-muted text-center"},[t._v(" Вы получите письмо с уникальным токеном ")])],1),a("button",{staticClass:"btn btn-pill btn-accent d-table mx-auto",attrs:{type:"submit"}},[t._v(" Сбросить пароль ")])])],1)],1),a("div",{staticClass:"auth-form__meta d-flex mt-4"},[a("d-link",{staticClass:"mx-auto",attrs:{tag:"a",to:"login"}},[t._v(" Вернуться к форме авторизации ")])],1)],1)],1)],1)},T=[],D={},I=Object(u["a"])(D,A,T,!1,null,null,null),N=I.exports,M=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{staticClass:"main-content-container px-4",attrs:{fluid:""}},[a("div",{staticClass:"mt-4"},[a("TheUserAccountDetails"),a("TheSubscriptionAndRates")],1)])},U=[],B=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"mb-4"},[a("d-list-group",{attrs:{flush:""}},[a("d-list-group-item",{staticClass:"p-3"},[a("d-row",[a("d-col",[a("d-form",[a("d-form-row",[a("d-col",{staticClass:"form-group",attrs:{lg:"6",md:"12",sm:"12"}},[a("label",{attrs:{for:"feFirstName"}},[t._v("Имя")]),a("d-form-input",{staticClass:"mb-3",attrs:{id:"feFirstName",type:"text",placeholder:"First Name",value:"Игорь Олегович Суханов"}}),a("label",{attrs:{for:"feEmail"}},[t._v("Электронная почта:")]),a("d-form-input",{staticClass:"mb-3",attrs:{id:"feEmail",type:"email",placeholder:"Email Address",value:"suhanov.dev.work@gmail.com"}}),a("label",{attrs:{for:"pass"}},[t._v("Сменить пароль:")]),a("d-form-input",{staticClass:"mb-5",attrs:{id:"pass",type:"password",placeholder:"Сменить пароль",value:"sdfsdfsdfsdfdsf"}}),a("d-card",{staticClass:"p-3"},[a("d-card-body",{attrs:{title:"Ключи"}},[a("div",{staticClass:"align-self-start mb-4"},[a("h6",[t._v("API-ключ")]),a("span",[t._v("b5d63f6ed7173b99702a45799ac52c3327999412")])]),a("div",{staticClass:"align-self-start"},[a("h6",[t._v("Секретный ключ для стандартизации")]),a("span",[t._v("785690804b09c2947e41ae44bf3605e7a14e408b")])])])],1)],1),a("d-col",{staticClass:"form-group",attrs:{lg:"5",md:"12",sm:"12","offset-lg":"1"}},[a("d-card",{staticClass:"mb-3 p-md-0 p-3"},[a("d-card-body",{attrs:{title:"У вас на счету"}},[a("span",[t._v("1000 ₽")]),a("div",{staticClass:"d-flex mt-3"},[a("d-button",{staticClass:"mb-2 mr-1",attrs:{size:"sm",theme:"primary"}},[t._v(" Пополнить ")]),a("d-button",{staticClass:"mb-2 mr-1",attrs:{size:"sm",theme:"primary"}},[t._v(" Выставить счет ")])],1)])],1),a("d-card",{staticClass:"p-md-0 p-3"},[a("d-card-body",{attrs:{title:"Ваш тариф"}},[a("h5",[t._v("Тариф «Бесплатный», действует бессрочно.")]),a("d-button",{staticClass:"mb-2 mr-1",attrs:{size:"sm",theme:"primary"}},[t._v(" Сменить тариф ")])],1)],1),a("h4",{staticClass:"mt-3"},[a("a",{staticClass:"d-block",attrs:{href:""}},[t._v("Посмотреть все тарифы")])])],1)],1)],1)],1)],1)],1)],1)],1)},H=[],F={name:"UserAccountDetails",props:{title:{type:String,default:"Account Details"}}},L=F,R=(a("90ad"),Object(u["a"])(L,B,H,!1,null,"6cbfb2fe",null)),V=R.exports,z=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"mb-4"},[a("d-list-group",{attrs:{flush:""}},[a("d-list-group-item",{staticClass:"p-3"},[a("d-row",[a("d-col",[a("h5",{staticClass:"heading"},[t._v(" Информация о подписке ")]),a("d-card",{staticClass:"d-inline-block"},[a("d-card-body",[a("span",[t._v("Тариф «Бесплатный», действует бессрочно.")])])],1),a("d-link",{staticClass:"link",attrs:{href:""}},[t._v(" Сменить тариф ")]),a("d-link",{staticClass:"link",attrs:{href:""}},[t._v(" Посмотреть все тарифы ")]),a("table",{staticClass:"table mb-0"},[a("thead",{staticClass:"bg-light"},[a("tr",[a("th",{staticClass:"border-0",attrs:{scope:"col"}},[t._v(" Имя метода ")]),a("th",{staticClass:"border-0",attrs:{scope:"col"}},[t._v(" Стоимость обращения ")])])]),a("tbody",[a("tr",[a("td",[t._v("placeholder")]),a("td",[t._v("1000")])]),a("tr",[a("td",[t._v("placeholder")]),a("td",[t._v("2000")])]),a("tr",[a("td",[t._v("placeholder")]),a("td",[t._v("3000")])]),a("tr",[a("td",[t._v("placeholder")]),a("td",[t._v("4000")])])])])],1)],1)],1)],1)],1)},q=[],J=(a("e12c"),{}),G=Object(u["a"])(J,z,q,!1,null,"0d0c96ce",null),K=G.exports,Q={name:"UserProfile",components:{TheUserAccountDetails:V,TheSubscriptionAndRates:K}},W=Q,X=Object(u["a"])(W,M,U,!1,null,null,null),Y=X.exports,Z=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{staticClass:"main-content-container px-4",attrs:{fluid:""}},[a("div",{staticClass:"mt-4"},[a("TheSubscriptionAndRates")],1)])},tt=[],et={name:"UserProfile",components:{TheSubscriptionAndRates:K}},at=et,st=Object(u["a"])(at,Z,tt,!1,null,null,null),rt=st.exports,nt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{staticClass:"main-content-container px-4",attrs:{fluid:""}},[a("div",{staticClass:"mt-4"},[a("TheStatistics")],1)])},it=[],lt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"mb-4"},[a("d-list-group",{attrs:{flush:""}},[a("d-list-group-item",{staticClass:"p-3"},[a("d-row",[a("d-col",[a("h5",{staticClass:"heading"},[t._v(" Статистика ")])])],1)],1)],1)],1)},ot=[],ct=(a("e70f"),{}),dt=Object(u["a"])(ct,lt,ot,!1,null,"1a79fa56",null),ut=dt.exports,pt={name:"UserProfile",components:{TheStatistics:ut}},mt=pt,ft=Object(u["a"])(mt,nt,it,!1,null,null,null),bt=ft.exports,vt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{staticClass:"main-content-container px-4 pb-4",attrs:{fluid:""}},[a("div",{staticClass:"error"},[a("div",{staticClass:"error__content"},[a("h2",[t._v("500")]),a("h3",[t._v("Something went wrong!")]),a("p",[t._v("There was a problem on our end. Please try again later.")]),a("d-button",{attrs:{pill:""}},[t._v(" ← Go Back ")])],1)])])},ht=[],gt={},_t=Object(u["a"])(gt,vt,ht,!1,null,null,null),yt=_t.exports;s["default"].use(f["a"]);var Ct=new f["a"]({mode:"history",base:"/admin/",linkActiveClass:"active",linkExactActiveClass:"exact-active",scrollBehavior:function(){return{x:0,y:0}},routes:[{path:"/",redirect:"/login"},{path:"/login",name:"login",meta:{layout:"header-navigation"},component:x},{path:"/register",name:"register",meta:{layout:"header-navigation"},component:$},{path:"/forgot-password",name:"forgot-password",meta:{layout:"header-navigation"},component:N},{path:"/user-profile",name:"user-profile",component:Y},{path:"/subscription",name:"user-subscription",component:rt},{path:"/statistics",name:"user-statistics",component:bt},{path:"/errors",name:"errors",component:yt},{path:"*",redirect:"/errors"}]}),Ot="IS_AUTH";s["default"].use(g["a"]);var wt=new g["a"].Store({state:{isAuth:!1},mutations:Object(h["a"])({},Ot,(function(t,e){t.isAuth=e})),actions:{},modules:{}}),xt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{attrs:{fluid:""}},[a("d-row",[a("MainSidebar",{attrs:{items:t.sidebarItems}}),a("d-col",{staticClass:"main-content offset-lg-2 offset-md-3 p-0",attrs:{tag:"main",lg:"10",md:"9",sm:"12"}},[a("MainNavbar"),t._t("default")],2)],1)],1)},jt=[],Pt=function(){return[{title:"Главное меню",items:[{title:"Общие сведения",to:"/user-profile",htmlBefore:'<i class="material-icons">&#xE7FD;</i>'},{title:"Подписка и тарифы",to:"/subscription",htmlBefore:'<i class="material-icons">payment</i>'},{title:"Статистика",to:"/statistics",htmlBefore:'<i class="material-icons">&#xE917;</i>'},{title:"История операций",to:"/history",htmlBefore:'<i class="material-icons">&#xE889;</i>'},{title:"Реквизиты для акта",to:"/requisites",htmlBefore:'<i class="material-icons">&#xE2C7;</i>'}]}]},kt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{class:["main-navbar","bg-white",t.stickyTop?"sticky-top":""]},[a("d-navbar",{staticClass:"align-items-stretch flex-md-nowrap p-0",attrs:{type:"light"}},[t.isAuth?a("NavbarNav"):t._e(),t.mobile?a("NavbarToggle"):t._e()],1)],1)},Et=[],St=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-navbar-nav",{staticClass:"flex-row ml-auto"},[a("li",{staticClass:"nav-item dropdown"},[a("a",{directives:[{name:"d-toggle",rawName:"v-d-toggle.user-actions",modifiers:{"user-actions":!0}}],staticClass:"nav-link dropdown-toggle text-nowrap px-3"},[t.avatar?a("img",{staticClass:"user-avatar rounded-circle mr-2",attrs:{src:"",alt:"User Avatar"}}):a("span",{staticClass:"avatar-placeholder"}),a("span",{staticClass:"d-none d-md-inline-block"},[t._v("Игорь Суханов")])]),a("d-collapse",{staticClass:"dropdown-menu dropdown-menu-small",attrs:{id:"user-actions"}},[a("d-dropdown-item",{attrs:{to:"user-profile"}},[a("i",{staticClass:"material-icons"},[t._v("")]),t._v(" Общие сведения ")]),a("d-dropdown-item",{attrs:{to:"subscription"}},[a("i",{staticClass:"material-icons"},[t._v("")]),t._v(" Подписка и тарифы ")]),a("d-dropdown-item",{attrs:{to:"statistics"}},[a("i",{staticClass:"material-icons"},[t._v("")]),t._v(" Статистика ")]),a("d-dropdown-item",{attrs:{to:"/"}},[a("i",{staticClass:"material-icons"},[t._v("")]),t._v(" История операций ")]),a("d-dropdown-item",{attrs:{to:"/"}},[a("i",{staticClass:"material-icons"},[t._v("")]),t._v(" Реквизиты для акта ")]),a("d-dropdown-divider"),a("d-dropdown-item",{staticClass:"text-danger",attrs:{href:""}},[a("i",{staticClass:"material-icons text-danger"},[t._v("")]),t._v(" Выйти ")])],1)],1)])},$t=[],At={data:function(){return{avatar:null}}},Tt=At,Dt=(a("9585"),a("f4bb"),Object(u["a"])(Tt,St,$t,!1,null,"36ae2b30",null)),It=Dt.exports,Nt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("nav",{staticClass:"nav"},[a("a",{staticClass:"nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center",attrs:{href:"#"},on:{click:t.handleClick}},[a("i",{staticClass:"material-icons"},[t._v("")])])])},Mt=[],Ut={name:"NavbarToggle",methods:{handleClick:function(){this.$eventHub.$emit("toggle-sidebar")}}},Bt=Ut,Ht=Object(u["a"])(Bt,Nt,Mt,!1,null,null,null),Ft=Ht.exports;function Lt(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function Rt(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?Lt(Object(a),!0).forEach((function(e){Object(h["a"])(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):Lt(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var Vt={components:{NavbarNav:It,NavbarToggle:Ft},props:{stickyTop:{type:Boolean}},data:function(){return{mobile:!1}},computed:Rt({},Object(g["c"])(["isAuth"])),created:function(){window.matchMedia("(max-width: 576px)").matches&&(this.mobile=!0)}},zt=Vt,qt=(a("cafc"),Object(u["a"])(zt,kt,Et,!1,null,"449f520c",null)),Jt=qt.exports,Gt=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("aside",{class:["main-sidebar","col-12","col-md-3","col-lg-2","px-0",t.sidebarVisible?"open":""]},[s("div",{staticClass:"main-navbar"},[s("nav",{staticClass:"navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0"},[s("a",{staticClass:"navbar-brand w-100 mr-0",staticStyle:{"line-height":"25px"},attrs:{href:"#"}},[s("div",{staticClass:"d-table m-auto"},[s("img",{staticClass:"d-inline-block align-top mr-1",staticStyle:{"max-width":"25px"},attrs:{id:"main-logo",src:a("3fd4"),alt:"НИП"}}),t.hideLogoText?t._e():s("span",{staticClass:"d-none d-md-inline ml-1"},[t._v("НИП")])])]),s("a",{staticClass:"toggle-sidebar d-sm-inline d-md-none d-lg-none",on:{click:t.handleToggleSidebar}},[s("i",{staticClass:"material-icons"},[t._v("")])])])]),t._m(0),t.items?s("div",{staticClass:"nav-wrapper"},t._l(t.items,(function(e,a){return s("div",{key:a},[e.title?s("h6",{staticClass:"main-sidebar__nav-title"},[t._v(" "+t._s(e.title)+" ")]):t._e(),"undefined"!==typeof e.items&&e.items.length?s("d-nav",{staticClass:"nav--no-borders flex-column"},t._l(e.items,(function(e,r){return s("li",{key:r,staticClass:"nav-item dropdown"},[s("d-link",{directives:[{name:"d-toggle",rawName:"v-d-toggle",value:"snc-"+a+"-"+r,expression:"`snc-${navIdx}-${navItemIdx}`"}],class:["nav-link",e.items&&e.items.length?"dropdown-toggle":""],attrs:{to:e.to}},[e.htmlBefore?s("div",{staticClass:"item-icon-wrapper",domProps:{innerHTML:t._s(e.htmlBefore)}}):t._e(),e.title?s("span",[t._v(t._s(e.title))]):t._e(),e.htmlAfter?s("div",{staticClass:"item-icon-wrapper",domProps:{innerHTML:t._s(e.htmlAfter)}}):t._e()]),e.items&&e.items.length?s("d-collapse",{staticClass:"dropdown-menu dropdown-menu-small",attrs:{id:"snc-"+a+"-"+r,accordion:"sidebar-items-accordion"}},t._l(e.items,(function(e,a){return s("d-dropdown-item",{key:a,attrs:{href:e.href,to:e.to}},[t._v(" "+t._s(e.title)+" ")])})),1):t._e()],1)})),0):t._e()],1)})),0):t._e()])},Kt=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("form",{staticClass:"main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none",attrs:{action:"#"}},[a("div",{staticClass:"input-group input-group-seamless ml-3"},[a("div",{staticClass:"input-group-prepend"},[a("div",{staticClass:"input-group-text"},[a("i",{staticClass:"fas fa-search"})])]),a("input",{staticClass:"navbar-search form-control",attrs:{type:"text",placeholder:"Search for something...","aria-label":"Search"}})])])}];function Qt(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function Wt(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?Qt(Object(a),!0).forEach((function(e){Object(h["a"])(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):Qt(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var Xt={name:"MainSidebar",props:{hideLogoText:{type:Boolean},items:{type:Array,required:!0}},data:function(){return{sidebarVisible:!1}},computed:Wt({},Object(g["c"])(["isAuth"])),created:function(){this.$eventHub.$on("toggle-sidebar",this.handleToggleSidebar)},beforeDestroy:function(){this.$eventHub.$off("toggle-sidebar")},methods:{handleToggleSidebar:function(){this.sidebarVisible=!this.sidebarVisible}}},Yt=Xt,Zt=(a("23b8"),Object(u["a"])(Yt,Gt,Kt,!1,null,null,null)),te=Zt.exports,ee={name:"Analytics",components:{MainNavbar:Jt,MainSidebar:te},data:function(){return{sidebarItems:Pt()}}},ae=ee,se=Object(u["a"])(ae,xt,jt,!1,null,null,null),re=se.exports,ne=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("d-container",{attrs:{fluid:""}},[s("d-row",[s("main",{staticClass:"main-content col-lg-12 col-md-12 col-sm-12 p-0"},[s("div",{class:["main-navbar","bg-white"]},[s("d-container",{staticClass:"p-0"},[s("d-navbar",{staticClass:"align-items-stretch flex-md-nowrap p-0",attrs:{type:"light"}},[s("a",{staticClass:"navbar-brand",staticStyle:{"line-height":"25px"},attrs:{href:"#"}},[s("div",{staticClass:"d-table m-auto"},[s("img",{staticClass:"d-inline-block align-top mr-1 ml-3",staticStyle:{"max-width":"25px"},attrs:{id:"main-logo",src:a("3fd4"),alt:"НИП"}}),s("span",{staticClass:"d-none d-md-inline ml-1"},[t._v("НИП")])])])])],1)],1),t._t("default")],2)])],1)},ie=[],le={components:{}},oe=le,ce=Object(u["a"])(oe,ne,ie,!1,null,null,null),de=ce.exports,ue=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("d-container",{staticClass:"h-100",attrs:{fluid:""}},[a("main",{staticClass:"main-conten h-100"},[a("MainNavbar"),t._t("default")],2)])},pe=[];function me(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function fe(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?me(Object(a),!0).forEach((function(e){Object(h["a"])(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):me(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var be={components:{MainNavbar:Jt},data:function(){return{sidebarItems:Pt()}},computed:fe({},Object(g["c"])(["isAuth"]))},ve=be,he=Object(u["a"])(ve,ue,pe,!1,null,null,null),ge=he.exports,_e=!0;r["a"].install(s["default"]),s["default"].component("default-layout",re),s["default"].component("header-navigation-layout",de),s["default"].component("icon-sidebar-layout",ge),s["default"].config.productionTip=!1,s["default"].prototype.$eventHub=new s["default"],s["default"].use(i.a,{id:_e?"UA-115105611-1":"UA-115105611-2",router:Ct}),new s["default"]({router:Ct,store:wt,render:function(t){return t(m)}}).$mount("#app")},"5b4f":function(t,e,a){},"7b2b":function(t,e,a){},"84d0":function(t,e,a){},"90ad":function(t,e,a){"use strict";var s=a("e00c"),r=a.n(s);r.a},"93ec":function(t,e,a){},9585:function(t,e,a){"use strict";var s=a("a7d6"),r=a.n(s);r.a},a54d:function(t,e,a){},a7d6:function(t,e,a){},cafc:function(t,e,a){"use strict";var s=a("fa2a"),r=a.n(s);r.a},e00c:function(t,e,a){},e12c:function(t,e,a){"use strict";var s=a("93ec"),r=a.n(s);r.a},e70f:function(t,e,a){"use strict";var s=a("7b2b"),r=a.n(s);r.a},f4bb:function(t,e,a){"use strict";var s=a("84d0"),r=a.n(s);r.a},fa2a:function(t,e,a){}});
//# sourceMappingURL=app-legacy.2d0fe674.js.map