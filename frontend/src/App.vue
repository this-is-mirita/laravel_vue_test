<template>
  <div>
    <HeaderComponent/>
    <router-view/>
<!--<типо home page из за роутера/> -->
  </div>
</template>

<script setup>
import {onMounted} from 'vue'
import api from './api'
import HeaderComponent from "@/components/HeaderComponent.vue"; // импорт api.js

onMounted(() => {
  api.get('/hello').then(response => {
    console.log(response.data)
  })
});


</script>
