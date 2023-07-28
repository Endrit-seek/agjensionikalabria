export const useCityStore = defineStore('city', {
  state: () => ({
    cities: [] as City[]
  }),

  getters: {

  },

  actions: {
    async fetchCities() {
      const { index } = useCity()
      this.cities = await index()
    }
  },

  persist: {
    storage: persistedState.localStorage,
  },
})