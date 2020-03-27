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
            id="name"
            :class="{'is-invalid': v.$error}"
            v-model.trim="name"
        >


        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-if="!v.extAlphaNum"
        >
            Имя может содержать -, а-я, А-Я, a-z, A-Z, 0-9
        </div>
        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-else-if="!v.minLength"
        >
            Название должно быть не менее 3 символов
        </div>
        <div
            class="invalid-feedback"
            style="width: 100%;"
            v-else-if="!v.maxLength"
        >
            Название должно быть не более 15 символов
        </div>

    </div>
</template>

<script>

    export default {

        props: {
            value: {
                type: String,
                default: ''
            },
            v: {
                type: Object,
                required: true
            }
        },

        computed: {
            name: {
                get() {
                    return this.value
                },
                set(value) {
                    this.v.$touch();
                    // console.log(this.v.$touch());
                    this.$emit('input', value)
                }
            }
        }

    }
</script>

<style scoped>

</style>
