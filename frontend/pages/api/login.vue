<template>
  <div>
    <v-row align="center" justify="center" style="height:100vh">
      <v-card
        class="mx-auto pa-12 pb-8"
        elevation="8"
        max-width="448"
        rounded="lg"
        width="500"
      >
      
        <v-card-title primary-title class="d-flex align-center justify-center">
          <h1 class="ma-2 pb-10">Kycu ne Sistem</h1>
        </v-card-title>

        <v-form validate-on="submit lazy" @submit.prevent="handleLogin">
          <v-text-field
            v-model="email.value.value"
            :error-messages="email.errorMessage.value || errors.$state.errors.email"
            id="email"
            name="email"
            type="email"
            density="compact"
            placeholder="psh: kalabria@gmail.com"
            variant="outlined"
            label="Adresa e Email"
          >
            <template v-slot:prepend-inner>
              <v-icon size="xs-small" icon="mdi-email" />
            </template>
          </v-text-field>
          
          <v-text-field
            v-model="password.value.value"
            :error-messages="password.errorMessage.value || errors.$state.errors.password"
            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
            :type="visible ? 'text' : 'password'"
            id="password"
            name="password"
            density="compact"
            variant="outlined"
            placeholder="Shtyp fjalekalimin"
            label="Fjalekalimi"
            @click:append-inner="visible = !visible"
          >
            <template v-slot:prepend-inner>
              <v-icon size="xs-small" icon="mdi-lock-outline" />
            </template>
          </v-text-field>

          <v-btn
            block
            type="submit"
            class="mb-8"
            color="blue"
            size="large"
            variant="tonal"
          >
            Hyr
          </v-btn>
        </v-form>

        <div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between">
          <NuxtLink to="/forgot-password">
            Ke harruar fjalekalimin?
          </NuxtLink>
        </div>
      </v-card>
      
    </v-row>
  </div>
</template>

<script lang="ts" setup>
  definePageMeta({
    // middleware: [
    //   'auth'
    // ],
    layout: false
  })

  const errors = useErrorStore()
  const auth = useAuthStore();

  const visible = ref<boolean>(false);

  const { handleSubmit } = useForm({
    validationSchema: {
      email (value: string) {
        if (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)) return true

        return 'Must be a valid e-mail.'
      },
      password (value: string) {
        if (!!value && value.length >= 8) return true

        return 'Password must be 8 chars or more'
      }
    }
  })

  const email = useField('email');
  const password = useField('password');

  const handleLogin = handleSubmit(async (values) => {
    if (values.email && values.password) {
      const message = useMessageStore()

      await auth.login({
        email: values.email,
        password: values.password
      });

      if (auth.isLoggedIn) {
        message.text = 'Login Successful!';
        message.timeout = 1000;
        navigateTo('/')
      }

      setTimeout(() => {
        message.$reset()
      }, message.$state.timeout) 
    }
  })
</script>