import{u as U}from"./useAuthStore.c37c1084.js";import{u as R}from"./useProductStore.b06af311.js";import{u as P}from"./useCityStore.095b2b87.js";import{K as w,x as S,r as B,l as s,c as r,b as n,w as i,i as o,L as z,M as N,o as c,N as u,O as _,n as A,a as p,t as d}from"./entry.f4882d83.js";import"./useApiFetch.b9d2d0d6.js";import"./useCity.5398132d.js";const D=["textContent"],M=["textContent"],I={__name:"index",setup(T){const{mdAndUp:a}=w(),g=U(),h=R(),v=P(),e=N();S(async()=>{await g.fetchUser(),await h.fetchProducts(),await v.fetchCities()});const b=[{src:e.app.baseURL+"img/C1.jpg"},{src:e.app.baseURL+"img/C2.jpg"},{src:e.app.baseURL+"img/C3.jpg"},{src:e.app.baseURL+"img/C4.jpg"},{src:e.app.baseURL+"img/C5.jpg"}],C=B([{label:"Banese",image:e.app.baseURL+"img/P1.jpg",description:"Banese ne shitje"},{label:"Shpi",image:e.app.baseURL+"img/P2.jpg",description:"Shpi ne shitje"},{label:"Lokal",image:e.app.baseURL+"img/P3.jpg",description:"Lokal ne shitje"},{label:"Toke",image:e.app.baseURL+"img/P4.jpg",description:"Toke ne shitje"},{label:"Prone",image:e.app.baseURL+"img/P5.jpg",description:"Prone ne shitje"}]);return(V,E)=>{const m=s("v-btn"),f=s("v-carousel-item"),k=s("v-carousel"),x=s("v-img"),j=s("v-timeline-item"),L=s("v-timeline"),y=s("v-sheet");return c(),r("div",null,[n(k,{"hide-delimiters":!o(a),cycle:"",height:o(a)?"700":"300","show-arrows":"hover","hide-delimiter-background":""},{prev:i(({props:t})=>[n(m,{class:"ma-2",variant:"text",icon:"mdi-chevron-left",onClick:t.onClick},null,8,["onClick"])]),next:i(({props:t})=>[n(m,{class:"ma-2",variant:"text",icon:"mdi-chevron-right",onClick:t.onClick},null,8,["onClick"])]),default:i(()=>[(c(),r(u,null,_(b,(t,l)=>n(f,{key:l,src:t.src,cover:""},null,8,["src"])),64))]),_:1},8,["hide-delimiters","height"]),n(y,{style:z(o(a)?"margin: 0% 15% 0% 15%; padding: 0% 1% 0% 1%":"")},{default:i(()=>[n(L,{"truncate-line":"end"},{default:i(()=>[(c(!0),r(u,null,_(o(C),(t,l)=>(c(),A(j,{size:o(a)?"x-small":"",key:l},{opposite:i(()=>[n(x,{src:t.image},null,8,["src"])]),default:i(()=>[p("div",null,[p("p",{class:"text-h6",textContent:d(t.label)},null,8,D),p("p",{textContent:d(t.description)},null,8,M)])]),_:2},1032,["size"]))),128))]),_:1})]),_:1},8,["style"])])}}};export{I as default};
