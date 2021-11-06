<template>
  <v-container
    fluid
    justify-center
    fill-height
    class="login"
  >
    <v-row
      align="center"
      justify="center"
      align-content="center"
    >
      <v-col
        sm="8"
      >
        <slot name="logo" />
      </v-col>
      <v-col sm="8">
        <v-card
          max-width="550"
          class="mx-auto login-card"
        >
          <v-card-title><slot name="title" /></v-card-title>
          <v-card-text>
            <slot />
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<style>
.login {
  background: url('https://images.unsplash.com/photo-1515248101569-f6e91c070aa8?ixlib=rb-0.3.5&q=99&fm=jpg&crop=entropy&cs=tinysrgb&w=2048&fit=max&s=59dbea99695b93dce5eba690b7ea1c6e?momo_cache_bg_uuid=439716cf-8d54-49ba-bd9d-7ee72a57d837');
}
</style>
