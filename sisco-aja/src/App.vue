<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <header class="header">
  <div class="container navbar">
    <!-- Logo -->
    <div class="logo">
      <b>Emporio</b></div>

    <!-- Search Bar -->
    <div class="search-bar">
      <input type="text" placeholder="Search" />
      
    </div>

    <!-- Navigation Links -->
    <nav class="nav-links">
      <b><a href="#">New Products</a>
      <a href="#">Men</a>
      <a href="#">Women</a>
      <a href="#">Login</a>
      <a href="#" class="signup-button">Sign Up</a>
    </b>
    </nav>
  </div>
  
  <div class="bg-image">
    <div class="container">
      <img src="@/assets/gambaran.jpg" alt="Gambaran" />
    </div>
    </div>
  

  
</header>

  <RouterView />
</template>
