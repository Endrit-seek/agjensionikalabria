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
  onMounted(async () => {
    await auth.fetchUser()
  });
</script>