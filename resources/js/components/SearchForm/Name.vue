<template>
    <div class="input-group">

        <div class="d-none d-md-block">
            <div class="input-group-prepend d-block">
                <span class="input-group-text">Имя</span>
            </div>
        </div>
        <label for="name" class="col-12 d-md-none px-0 mb-0">Имя</label>
        <input
            type="text"
            class="form-control"
            :class="{'is-invalid': $v.name.$error}"
            id="name"
            v-model.trim="$v.name.$model"
        >

        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-if="!$v.name.extAlphaNum"
        >
            Имя может содержать -, а-я, А-Я, a-z, A-Z, 0-9
        </div>
        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-else-if="!$v.name.minLength"
        >
            Название должно быть не менее 3 символов
        </div>
        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-else-if="!$v.name.maxLength"
        >
            Название должно быть не более 15 символов
        </div>
    </div>
</template>

<script>
    import {helpers, maxLength, minLength} from "vuelidate/lib/validators";
    import {extAlphaNum} from "../../validators";

    export default {
        name: "Name",
        data() {
            return {
                name: '',
            }
        },
        validations: {
            name: {
                extAlphaNum,
                minLength: minLength(3),
                maxLength: maxLength(15)
            }
        },
    }
</script>

<style scoped>

</style>
