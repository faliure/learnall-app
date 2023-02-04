<script setup>
</script>

<template>
  <section class="text-center">
    <h1 class="text-2xl font-bold mb-12">Palette</h1>

    <div class="flex flex-col items-center gap-3 align-middle text-center">
      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-gray-100 " title="gray-100" v-text="100"></div>
        <div class="square bg-gray-200" title="gray-200" v-text="200"></div>
        <div class="square bg-gray-300" title="gray-300" v-text="300"></div>
        <div class="square bg-gray-400" title="gray-400" v-text="400"></div>
        <div class="square bg-gray-500" title="gray-500" v-text="500"></div>
        <div class="square bg-gray-600" title="gray-600" v-text="600"></div>
        <div class="square bg-gray-700" title="gray-700" v-text="700"></div>
        <div class="square bg-gray-800" title="gray-800" v-text="800"></div>
        <div class="square bg-gray-900" title="gray-900" v-text="900"></div>
      </div>

      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-blue-100" title="blue-100" v-text="100"></div>
        <div class="square bg-blue-200" title="blue-200" v-text="200"></div>
        <div class="square bg-blue-300" title="blue-300" v-text="300"></div>
        <div class="square bg-blue-400" title="blue-400" v-text="400"></div>
        <div class="square bg-blue-500" title="blue-500" v-text="500"></div>
        <div class="square bg-blue-600" title="blue-600" v-text="600"></div>
        <div class="square bg-blue-700" title="blue-700" v-text="700"></div>
        <div class="square bg-blue-800" title="blue-800" v-text="800"></div>
        <div class="square bg-blue-900" title="blue-900" v-text="900"></div>
      </div>

      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-green-100" title="green-100" v-text="100"></div>
        <div class="square bg-green-200" title="green-200" v-text="200"></div>
        <div class="square bg-green-300" title="green-300" v-text="300"></div>
        <div class="square bg-green-400" title="green-400" v-text="400"></div>
        <div class="square bg-green-500" title="green-500" v-text="500"></div>
        <div class="square bg-green-600" title="green-600" v-text="600"></div>
        <div class="square bg-green-700" title="green-700" v-text="700"></div>
        <div class="square bg-green-800" title="green-800" v-text="800"></div>
        <div class="square bg-green-900" title="green-900" v-text="900"></div>
      </div>
      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-orange-100" title="orange-100" v-text="100"></div>
        <div class="square bg-orange-200" title="orange-200" v-text="200"></div>
        <div class="square bg-orange-300" title="orange-300" v-text="300"></div>
        <div class="square bg-orange-400" title="orange-400" v-text="400"></div>
        <div class="square bg-orange-500" title="orange-500" v-text="500"></div>
        <div class="square bg-orange-600" title="orange-600" v-text="600"></div>
        <div class="square bg-orange-700" title="orange-700" v-text="700"></div>
        <div class="square bg-orange-800" title="orange-800" v-text="800"></div>
        <div class="square bg-orange-900" title="orange-900" v-text="900"></div>
      </div>


      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-yellow-100" title="yellow-100" v-text="100"></div>
        <div class="square bg-yellow-200" title="yellow-200" v-text="200"></div>
        <div class="square bg-yellow-300" title="yellow-300" v-text="300"></div>
        <div class="square bg-yellow-400" title="yellow-400" v-text="400"></div>
        <div class="square bg-yellow-500" title="yellow-500" v-text="500"></div>
        <div class="square bg-yellow-600" title="yellow-600" v-text="600"></div>
        <div class="square bg-yellow-700" title="yellow-700" v-text="700"></div>
        <div class="square bg-yellow-800" title="yellow-800" v-text="800"></div>
        <div class="square bg-yellow-900" title="yellow-900" v-text="900"></div>
      </div>

      <div class="flex flex-row justify-around gap-2">
        <div class="square bg-red-100" title="red-100" v-text="100"></div>
        <div class="square bg-red-200" title="red-200" v-text="200"></div>
        <div class="square bg-red-300" title="red-300" v-text="300"></div>
        <div class="square bg-red-400" title="red-400" v-text="400"></div>
        <div class="square bg-red-500" title="red-500" v-text="500"></div>
        <div class="square bg-red-600" title="red-600" v-text="600"></div>
        <div class="square bg-red-700" title="red-700" v-text="700"></div>
        <div class="square bg-red-800" title="red-800" v-text="800"></div>
        <div class="square bg-red-900 inline-flex items-center justify-around" title="red-900" v-text="900"></div>
      </div>
    </div>
  </section>
</template>

<style scoped>
  div.square {
    display: inline-flex;
    height: 2.5rem;
    width: 2.5rem;
    align-items: center;
    justify-content: space-around;
    font-weight: bold;
    font-size: 0.7rem;
  }
</style>
