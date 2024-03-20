<script setup lang="ts">
import {watch} from "vue"
import {useApiRef} from "ui"

// Получаем данные запроса
const {data: info} = useApiRef<{
  title: string,
  code: string
}>('titanrath')

watch(info, () => {
  document.title = info.value?.title ?? ''
})
</script>

<template>
  <div v-if="info">
    <h1>{{ info.title }}</h1>
    <div v-html="info.code"></div>
    <div>
      <RouterLink to="/description">description</RouterLink>
    </div>
  </div>
</template>

<style lang="css"></style>
