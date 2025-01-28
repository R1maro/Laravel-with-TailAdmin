<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head } from "@inertiajs/vue3";
import BasicChartView from "@/Components/Dashboard/BasicChartView.vue"
</script>

<template>
    <Head title="Dashboard" />
    <DefaultLayout>
        <BasicChartView/>
    </DefaultLayout>
</template>
