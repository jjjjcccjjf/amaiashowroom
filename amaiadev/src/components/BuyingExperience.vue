<template>
    <div>
      <BasicRadioSurvey heading="Knowledge of the seller" modulename="buying_experience" fieldname="be_knowledge" v-if="currentModule == 1 && currentQuestion == 1" />
      <BasicRadioSurvey heading="Courtesy and attitude if the seller" modulename="buying_experience" fieldname="be_courtesy" v-if="currentModule == 1 && currentQuestion == 2" />
      <BasicRadioSurvey heading="Response time of the seller in attending to your needs/concern" modulename="buying_experience" fieldname="be_response" v-if="currentModule == 1 && currentQuestion == 3" />
      <BasicRadioSurvey heading="Appearance and attire of the seller" modulename="buying_experience" fieldname="be_appearance" v-if="currentModule == 1 && currentQuestion == 4" />
    <!-- <div v-if="currentModule == 1 && currentQuestion == 1" id="q1">
        <h4>Knowledge of the seller</h4>
        <ul class="radiob">
            <li>
              <input type="radio" id="buying1a" name="knowledge" value="Highly Satisfied" v-model="survey['buying_experience'].be_knowledge" @change="updateRadio"/>
              <label for="buying1a">Highly Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1b" name="knowledge" value="Satisfied" v-model="survey['buying_experience'].be_knowledge" @change="updateRadio"/>
              <label for="buying1b">Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1c" name="knowledge" value="Neutral" v-model="survey['buying_experience'].be_knowledge" @change="updateRadio"/>
              <label for="buying1c">Neutral</label>
            </li>
            <li>
              <input type="radio" id="buying1d" name="knowledge" value="Dissatisfied" v-model="survey['buying_experience'].be_knowledge" @change="updateRadio"/>
              <label for="buying1d">Dissatisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1e" name="knowledge" value="Highly Dissatisfied" v-model="survey['buying_experience'].be_knowledge" @change="updateRadio"/>
              <label for="buying1e">Highly Dissatisfied</label>
            </li>
          </ul>
    </div> -->

    <!-- <div v-if="currentModule == 1 && currentQuestion == 2">
        <h4>Courtesy and attitude if the seller</h4>
          <ul class="radiob">
            <li>
              <input type="radio" id="buying1a" name="knowledge" value="Highly Satisfied" v-model="survey['buying_experience'].be_courtesy" @change="updateRadio"/>
              <label for="buying1a">Highly Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1b" name="knowledge" value="Satisfied" v-model="survey['buying_experience'].be_courtesy" @change="updateRadio"/>
              <label for="buying1b">Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1c" name="knowledge" value="Neutral" v-model="survey['buying_experience'].be_courtesy" @change="updateRadio"/>
              <label for="buying1c">Neutral</label>
            </li>
            <li>
              <input type="radio" id="buying1d" name="knowledge" value="Dissatisfied" v-model="survey['buying_experience'].be_courtesy" @change="updateRadio"/>
              <label for="buying1d">Dissatisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1e" name="knowledge" value="Highly Dissatisfied" v-model="survey['buying_experience'].be_courtesy" @change="updateRadio"/>
              <label for="buying1e">Highly Dissatisfied</label>
            </li>
          </ul>
    </div>

    <div v-if="currentModule == 1 && currentQuestion == 3">
        <h4>Response time of the seller in attending to your needs/concern</h4>
          <ul class="radiob">
            <li>
              <input type="radio" id="buying1a" name="knowledge" value="Highly Satisfied" v-model="survey['buying_experience'].be_response" @change="updateRadio"/>
              <label for="buying1a">Highly Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1b" name="knowledge" value="Satisfied" v-model="survey['buying_experience'].be_response" @change="updateRadio"/>
              <label for="buying1b">Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1c" name="knowledge" value="Neutral" v-model="survey['buying_experience'].be_response" @change="updateRadio"/>
              <label for="buying1c">Neutral</label>
            </li>
            <li>
              <input type="radio" id="buying1d" name="knowledge" value="Dissatisfied" v-model="survey['buying_experience'].be_response" @change="updateRadio"/>
              <label for="buying1d">Dissatisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1e" name="knowledge" value="Highly Dissatisfied" v-model="survey['buying_experience'].be_response" @change="updateRadio"/>
              <label for="buying1e">Highly Dissatisfied</label>
            </li>
          </ul>
    </div>

    <div v-if="currentModule == 1 && currentQuestion == 4">
        <h4>Appearance and attire of the seller</h4>
          <ul class="radiob">
            <li>
              <input type="radio" id="buying1a" name="knowledge" value="Highly Satisfied" v-model="survey['buying_experience'].be_appearance" @change="updateRadio"/>
              <label for="buying1a">Highly Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1b" name="knowledge" value="Satisfied" v-model="survey['buying_experience'].be_appearance" @change="updateRadio"/>
              <label for="buying1b">Satisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1c" name="knowledge" value="Neutral" v-model="survey['buying_experience'].be_appearance" @change="updateRadio"/>
              <label for="buying1c">Neutral</label>
            </li>
            <li>
              <input type="radio" id="buying1d" name="knowledge" value="Dissatisfied" v-model="survey['buying_experience'].be_appearance" @change="updateRadio"/>
              <label for="buying1d">Dissatisfied</label>
            </li>
            <li>
              <input type="radio" id="buying1e" name="knowledge" value="Highly Dissatisfied" v-model="survey['buying_experience'].be_appearance" @change="updateRadio"/>
              <label for="buying1e">Highly Dissatisfied</label>
            </li>
          </ul>
    </div> -->

    </div>
</template>

<script>
import { mixin } from '../mixins/mixin.js'
import { module_mixin } from '../mixins/module_mixin.js'
import BasicRadioSurvey from './BasicRadioSurvey.vue'
    export default {
        components: { BasicRadioSurvey },
        mixins: [ mixin, module_mixin]
    }
</script>

<style scoped>

</style>