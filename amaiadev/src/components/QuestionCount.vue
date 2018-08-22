<template>
    <h5 v-if="!(this.currentModule == 6)">Question {{ currentQuestion }} of {{ totalQuestions }}</h5>
</template>

<script>
import { mixin } from '../mixins/mixin.js'
    export default {
        mixins: [ mixin ]
    }
</script>

<style scoped>

</style>