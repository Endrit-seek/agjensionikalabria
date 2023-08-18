import{_ as N}from"./client-only.d3214f8d.js";import{u as j}from"./useCityStore.095b2b87.js";import{f as S,r as V,x as L,Q,l as c,o as f,c as x,b as l,w as t,i as a,n as y,N as q,O as D,a as n,d as s,t as d,q as E}from"./entry.f4882d83.js";import{u as I}from"./useCity.5398132d.js";import"./useApiFetch.b9d2d0d6.js";const M={class:"ma-3"},O={class:"ma-3"},P={class:"ma-3"},G=S({__name:"[id]",setup(R){const o=V(),{cities:w}=j();return L(async()=>{const v=Q(),{show:b}=I(),m=await b(parseInt(v.params.id,10));o.value=m}),(v,b)=>{const m=c("v-carousel-item"),k=c("v-carousel"),_=c("v-sheet"),e=c("v-col"),i=c("v-icon"),u=c("v-row"),h=c("v-card"),B=c("v-container"),C=N;return f(),x("div",null,[l(C,null,{default:t(()=>[a(o)?(f(),y(B,{key:0},{default:t(()=>[l(u,null,{default:t(()=>[l(e,{cols:"9"},{default:t(()=>[l(_,{height:"auto",width:"auto",border:"",rounded:""},{default:t(()=>[l(k,null,{default:t(()=>[(f(!0),x(q,null,D(a(o).medias,(r,p)=>(f(),y(m,{key:p,src:r.url,cover:""},null,8,["src"]))),128))]),_:1})]),_:1})]),_:1}),l(e,null,{default:t(()=>[l(_,{"min-height":"52vh",height:"auto",width:"auto",border:"",rounded:""},{default:t(()=>[l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[l(h,{class:"pl-4 pb-2",title:"Informacione"},{default:t(()=>[l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-office-building-cog"}),s(" Lloji: "+d(a(o).type),1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-tag"}),s(" Statusi: "+d(a(o).status),1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-cash"}),s(" Qmimi: "+d(a(o).price)+"€ ",1)])]),_:1})]),_:1})]),_:1})]),_:1}),l(e,null,{default:t(()=>[l(h,{class:"pl-4",title:"Adresa"},{default:t(()=>[l(u,null,{default:t(()=>[l(e,null,{default:t(()=>{var r;return[n("div",null,[l(i,{icon:"mdi-city"}),s(" Qyteti: "+d((r=a(w).find(p=>{var g;return p.id===((g=a(o))==null?void 0:g.city_id)}))==null?void 0:r.name),1)])]}),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-home-city"}),s(" Lagjia: "+d(a(o).address),1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-road-variant"}),s(" Rruga: "+d(a(o).street),1)])]),_:1})]),_:1})]),_:1})]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[l(h,{class:"pl-4 pb-4",title:"Brendesia"},{default:t(()=>[l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-texture-box"}),s(" Siperfaqja: "+d(a(o).space)+"m2 ",1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-bed"}),s(" Dhoma: "+d(a(o).room),1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-bathtub"}),s(" Banjo: "+d(a(o).bath),1)])]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[n("div",null,[l(i,{icon:"mdi-sofa"}),s(" E Mobiluar: "+d(a(o).furnished?"Po":"Jo"),1)])]),_:1})]),_:1})]),_:1})]),_:1})]),_:1})]),_:1})]),_:1})]),_:1}),l(u,null,{default:t(()=>[l(e,null,{default:t(()=>[l(_,{"min-height":"40vh",height:"auto",width:"auto",border:"",rounded:""},{default:t(()=>[n("div",M,[n("h1",null,d(a(o).title),1)]),n("div",O,[n("h4",null,d(a(o).description),1)])]),_:1})]),_:1}),l(e,null,{default:t(()=>[l(_,{"min-height":"40vh",height:"auto",width:"auto",border:"",rounded:""},{default:t(()=>[n("div",P,[n("h1",null,[l(i,{icon:"mdi-phone",size:"sm"}),s(" Na kontaktoni: +383 xx xx")])])]),_:1})]),_:1})]),_:1})]),_:1})):E("",!0)]),_:1})])}}});export{G as default};