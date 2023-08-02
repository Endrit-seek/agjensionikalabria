export const useProductStore = defineStore('product', {
  state: () => ({
    products: [] as Product[],
    meta: {} as Meta,
    page: 1
  }),

  actions: {
    async fetchProducts(page?: number) {
      const { index } = useProduct()
      this.products = (await index(page)).data
      this.meta = (await index(page)).meta
    }
  },

  persist: {
    storage: persistedState.localStorage,
  },
})