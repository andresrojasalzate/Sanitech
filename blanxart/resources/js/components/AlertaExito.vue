<template>
    <div v-if="mostrarAlerta" class="alert alert-success">
        {{ mensaje }}
    </div>
</template>
<script>
export default {
    props: ['mensaje'],
    data() {
        return {
            mostrarAlerta: true
        };
    },
    mounted() {
        setTimeout(() => {
            this.mostrarAlerta = false;
        }, 1500); 
    }
};
</script>