<template>
  <input type="checkbox" :value="value" v-model="proxyChecked"
         class="text-purple-600  form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
</template>

<script>
export default {
  emits: ["update:checked"],

  props: {
    checked: {
      type: [Array, Boolean],
      default: false,
    },
    value: {
      default: null,
    },
  },

  computed: {
    proxyChecked: {
      get() {
        return this.checked;
      },

      set(val) {
        this.$emit("update:checked", val);
      },
    },
  },
};
</script>
