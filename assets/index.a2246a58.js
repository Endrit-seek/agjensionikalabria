import{u as P}from"./useAuthStore.31b8a659.js";import{u as w}from"./useProductStore.370634b0.js";import{u as S}from"./useCityStore.3a29bbb5.js";import{K as B,x as L,r as z,l as t,c as l,b as n,w as i,i as s,L as N,o as a,M as p,N as _,n as A,a as r,t as u}from"./entry.be546a25.js";import"./useApiFetch.498b3bbb.js";import"./useCity.1a140a99.js";const D=["textContent"],M=["textContent"],I={__name:"index",setup(T){const{mdAndUp:o}=B(),d=P(),g=w(),h=S();L(async()=>{await d.fetchUser(),await g.fetchProducts(),await h.fetchCities()});const v=[{src:"/img/C1.jpg"},{src:"/img/C2.jpg"},{src:"/img/C3.jpg"},{src:"/img/C4.jpg"},{src:"/img/C5.jpg"}],C=z([{label:"Banese",image:"/img/P1.jpg",description:"Banese ne shitje"},{label:"Shpi",image:"/img/P2.jpg",description:"Shpi ne shitje"},{label:"Lokal",image:"/img/P3.jpg",description:"Lokal ne shitje"},{label:"Toke",image:"/img/P4.jpg",description:"Toke ne shitje"},{label:"Prone",image:"/img/P5.jpg",description:"Prone ne shitje"}]);return(U,V)=>{const m=t("v-btn"),f=t("v-carousel-item"),k=t("v-carousel"),x=t("v-img"),j=t("v-timeline-item"),y=t("v-timeline"),b=t("v-sheet");return a(),l("div",null,[n(k,{"hide-delimiters":!s(o),cycle:"",height:s(o)?"700":"300","show-arrows":"hover","hide-delimiter-background":""},{prev:i(({props:e})=>[n(m,{class:"ma-2",variant:"text",icon:"mdi-chevron-left",onClick:e.onClick},null,8,["onClick"])]),next:i(({props:e})=>[n(m,{class:"ma-2",variant:"text",icon:"mdi-chevron-right",onClick:e.onClick},null,8,["onClick"])]),default:i(()=>[(a(),l(p,null,_(v,(e,c)=>n(f,{key:c,src:e.src,cover:""},null,8,["src"])),64))]),_:1},8,["hide-delimiters","height"]),n(b,{style:N(s(o)?"margin: 0% 15% 0% 15%; padding: 0% 1% 0% 1%":"")},{default:i(()=>[n(y,{"truncate-line":"end"},{default:i(()=>[(a(!0),l(p,null,_(s(C),(e,c)=>(a(),A(j,{size:s(o)?"x-small":"",key:c},{opposite:i(()=>[n(x,{src:e.image},null,8,["src"])]),default:i(()=>[r("div",null,[r("p",{class:"text-h6",textContent:u(e.label)},null,8,D),r("p",{textContent:u(e.description)},null,8,M)])]),_:2},1032,["size"]))),128))]),_:1})]),_:1},8,["style"])])}}};export{I as default};
