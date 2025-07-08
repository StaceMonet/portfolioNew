<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Navigation, Pagination } from 'vue3-carousel'
import { defineProps } from 'vue'

const props = defineProps({
  products: Array
})
</script>


<template>
  <Carousel
  :items-to-show="1"
  :wrap-around="true"
  :autoplay="false"
  :autoplayTimeout="5000"
  :transition="500"
>
    <Slide v-for="(product, index) in products" :key="index">
      <div class="carousel__item">
        <h2>{{ product.title }}</h2>
        <p v-html="product.body_html"></p>
        <img v-if="product.images && product.images.length" :src="product.images[0].src" width="200" />
      </div>
    </Slide>

    <template #addons>
      <Navigation />
      <Pagination />
    </template>
  </Carousel>
</template>