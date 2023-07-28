export const useProductStore = defineStore('product', {
  state: () => ({
    products: [] as Product[]
  }),

  getters: {

  },

  actions: {
    async fetchProducts() {
      const { index } = useProduct()
      this.products = await index()
    }
  },

  persist: {
    storage: persistedState.localStorage,
  },
})