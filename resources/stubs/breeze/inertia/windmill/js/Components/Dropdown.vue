<template>
  <div>
    <ul class="flex flex-shrink-0 items-center space-x-6">
      <!-- Profile menu -->
      <li class="relative">
        <div @click="open = ! open">
          <slot name="trigger"/>
        </div>
          <transition
              leave-active-class="transition ease-in duration-150"
              leave-from-class="opacity-100"
              leave-to-class="opacity-0">
            <ul v-show="open" class="absolute right-0 p-2 mt-2 space-y-2 w-56 text-gray-600 bg-white rounded-md border border-gray-100 shadow-md"
                aria-label="submenu">
              <li>
                <slot name="content"/>
              </li>
            </ul>
          </transition>
      </li>
    </ul>
  </div>
</template>

<script>
import { onMounted, onUnmounted, ref } from 'vue'

export default {
  setup() {
    let open = ref(false)

    const closeOnEscape = (e) => {
      if (open.value && e.keyCode === 27) {
        open.value = false
      }
    }

    onMounted(() => document.addEventListener('keydown', closeOnEscape))
    onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))

    return {
      open,
    }
  },
}
</script>
