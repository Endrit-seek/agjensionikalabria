<template>
  <div>
    <ClientOnly>
      <NuxtLayout>
        <NuxtPage />
      </NuxtLayout>
    </ClientOnly>
  </div>
</template>

<script setup lang="ts">
  const auth = useAuthStore()
  const products = useProductStore()
  const cities = useCityStore()

  onMounted(async () => {
    await auth.fetchUser()
    await products.fetchProducts()
    await cities.fetchCities()
  });
</script>