import{s,O as e}from"./entry.be546a25.js";import{a as i}from"./useCity.1a140a99.js";const r=s("city",{state:()=>({cities:[]}),actions:{async fetchCities(){const{index:t}=i();this.cities=await t()}},persist:{storage:e.localStorage}});export{r as u};
