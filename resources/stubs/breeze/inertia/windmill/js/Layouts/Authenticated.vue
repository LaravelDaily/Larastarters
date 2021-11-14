<template>
  <div>
    <div class="flex h-screen bg-gray-50">
      <Navigation />
      <NavigationMobile />

      <div class="flex flex-col flex-1 w-full">
        <TopMenu />

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
              <slot name="header" />
            </h2>

            <slot />
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import Navigation from './Navigation';
import TopMenu from "./TopMenu";
import NavigationMobile from './NavigationMobile';

export default {
  components: {
    NavigationMobile,
    TopMenu,
    Navigation,
  },
}
</script>
