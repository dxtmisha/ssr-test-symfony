<script setup lang="ts">
import {watch} from "vue"
import {useApiRef} from "ui"

// Получаем данные запроса
const {data: info} = useApiRef<{
  title: string,
  date: string,
  description: string
}>('titanrath/description')

watch(info, () => {
  document.title = info.value?.title ?? ''
})
</script>

<template>
  <div v-if="info">
    <div class="t-description__return">
      <RouterLink to="/">return</RouterLink>
    </div>
    <h1>{{ info.title }}</h1>
    <div>{{ info.date }}</div>
    <div v-html="info.description"></div>
  </div>
</template>

<style lang="css">
.t-description__return {
  padding-bottom: 16px;
}

.t-description__date {
  padding: 0 16px;
}
</style>
