<template>
  <div>
    <HeaderComponent/>
    <router-view/>
<!--<типо home page из за роутера/> -->
  </div>
</template>

<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue"; // импорт api.js
</script>
