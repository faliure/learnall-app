<script setup>
  defineProps({
    fromLang: Object,
    toLang: Object,
  });

</script>

<template>
    <div class="h-fit w-fit relative p-2 m-1">
        <div
          class="fflag ff-xl ff-sphere"
          :class="`fflag-${toLang.flag}`"
        ></div>

        <div class="absolute bottom-0 left-5">
            <div
              class="fflag ff-md ff-wave"
              :class="`fflag-${fromLang.flag}`"
            ></div>
        </div>
    </div>
</template>
