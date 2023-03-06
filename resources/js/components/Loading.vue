<template>
    <div class="text-center" v-if="loading">
        <v-progress-circular
            indeterminate
            color="primary"
        ></v-progress-circular>
    </div>
</template>

<script>
export default {
    props: {
        loading: Boolean,
    },
};
</script>

<style scoped>
.v-progress-circular {
    margin: 1rem;
}
</style>
