<script setup lang="ts">
import { Head, usePage } from "@inertiajs/vue3";

const { props } = usePage();

console.log(props);
</script>

<template>
    <Head title="Blog" />

    <div>This Is Blog : {{ props.slug }}</div>
</template>
