<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
                Registro de Atendimentos
            </h2>
            <DialogModal :show="showModal">
                <template #content>
                    <list-item class="
                mb-8
                items-center
                px-4
                py-2
                bg-gray-800
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
              ">
                        REGISTRO DE ATENDIMENTOS</list-item>
                    <form id="form" @submit.prevent="submit">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-3">
                                <label for="uc" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">UC ATENDIDA</label>
                                <input required v-model="form.uc" style="width: 100%" type="text" name="uc" id="uc"
                                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    " />
                            </div>
                            <div class="col-span-3">
                                <label for="equipe" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">EQUIPE</label>
                                <select required v-model="form.equipe" style="width: 100%" name="equipe" id="equipe"
                                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    ">
                                    <option v-for="equipe in equipes" :key="equipe.id" :value="equipe.id">
                                        {{ equipe.name }}
                                    </option>
                                </select>
                            </div>


                        </div>
                    </form>
                </template>

                <template #footer>
                    <div class="col-span-12 flex justify-end">
                        <a @click="showModal = false" class="
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-red-700
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-red-400
                  active:bg-red-600
                  focus:outline-none focus:bg-red-400 focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                ">Cancelar</a>
                        <button form="form" type="submit" class="
                  ml-2
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-green-700
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-green-400
                  active:bg-green-600
                  focus:outline-none focus:bg-green-400 focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                ">
                            Confirmar
                        </button>
                    </div>
                </template>
            </DialogModal>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="formPesquisa" @submit.prevent="submitPesquisa">
                <div class="grid grid-cols-12">
                    <div class="flex justify-end col-span-2">
                        <div class="
                  input-group
                  relative
                  flex flex-wrap
                  items-stretch
                  w-full
                  mb-1
                ">
                            <input type="search" v-model="formPesquisa.pesquisar" class="
                    mt-6
                    form-control
                    relative
                    flex-auto
                    min-w-0
                    block
                    w-full
                    px-3
                    py-1.5
                    text-xs
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                  " placeholder="Pesquisar" aria-label="Search" aria-describedby="button-addon2" />
                        </div>
                    </div>

                    <div class="col-span-7">
                        <button form="formPesquisa" type="submit" class="
                  mt-6
                  ml-2
                  btn
                  py-0.5
                  inline-block
                  px-3
                  bg-blue-800
                  text-white
                  rounded
                  shadow-mdcd
                  hover:bg-blue-600 hover:shadow-lg
                  focus:bg-blue-600
                  focus:shadow-lg
                  focus:outline-none
                  focus:ring-0
                  active:bg-blue-800 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out
                  flex
                  items-center
                ">
                            <magnify-icon />
                        </button>
                    </div>
                    <div class="mt-6 flex justify-end col-span-3">
                        <a @click="showModal = true" type="submit" class="
                  mb-1
                  ml-2
                  inline-flex
                  items-center
                  px-4
                  bg-gray-800
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-gray-700
                  active:bg-gray-900
                  focus:outline-none
                  focus:border-gray-900
                  focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                ">
                            REGISTRAR
                        </a>
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto w-full">
                <table class="
              mx-auto
              max-w-7xl
              w-full
              whitespace-nowrap
              rounded-lg
              bg-white
              divide-y divide-gray-300
              overflow-hidden
            ">
                    <thead class="bg-gray-900">
                        <tr class="text-white text-center">
                            <th class="font-semibold text-xs uppercase">EQUIPE</th>
                            <th class="font-semibold text-xs uppercase">ATENDENTE</th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                UC CONSULTADA
                            </th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                DATA ATENDIMENTO
                            </th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                PRIMEIRA CONSULTA ?
                            </th>

                            <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody v-for="atendimento in atendimentos.data" :key="atendimento.id"
                        class="divide-y divide-gray-200">
                        <tr class="text-center">
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ atendimento.equipe.name }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ atendimento.user.name }} </span>
                            </td>

                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ atendimento.uc_atendida }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{((( atendimento.created_at)))}} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span :class="{
                                    'bg-blue-600 text-white p-1 rounded':
                                        atendimento.primeira_consulta === 'SIM',
                                    'bg-gray-500 text-white p-1 rounded':
                                        atendimento.primeira_consulta === 'NAO',
                                }">
                                    {{ atendimento.primeira_consulta }}
                                </span>
                            </td>

                            <td class="text-xs px-2 py-2">
                                <Link :href="route('atendimentos.show', atendimento.id)" class="
                      ml-3
                      hover:underline
                      bg-blue-100
                      text-blue-800 text-xs
                      font-semibold
                      mr-2
                      px-2.5
                      py-0.5
                      rounded
                      dark:bg-red-200 dark:text-red-900
                    ">VISUALIZAR</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-2 flex flex-col items-center">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Visualizando
                    <span class="font-semibold text-gray-900 dark:text-white">{{
                            atendimentos.current_page
                    }}</span>
                    de
                    <span class="font-semibold text-gray-900 dark:text-white">{{
                            atendimentos.last_page
                    }}</span>
                    Páginas
                </span>
                <!-- Buttons -->
                <div class="inline-flex xs:mt-0">
                    <Link :href="atendimentos.prev_page_url" class="
                py-2
                px-4
                text-sm
                font-medium
                text-white
                bg-blue-800
                rounded-l
                hover:bg-blue-900
                dark:bg-blue-800
                dark:border-blue-700
                dark:text-blue-400
                dark:hover:bg-blue-700
                dark:hover:text-white
              ">
                    Anterior
                    </Link>
                    <Link :href="atendimentos.next_page_url" class="
                py-2
                px-4
                text-sm
                font-medium
                text-white
                bg-blue-800
                rounded-r
                border-0 border-l border-blue-700
                hover:bg-blue-900
                dark:bg-blue-800
                dark:border-blue-700
                dark:text-blue-400
                dark:hover:bg-blue-700
                dark:hover:text-white
              ">
                    Próximo
                    </Link>
                </div>
            </div>
        </div>
    </app-layout>
</template>
  
<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ListItem from "@/Components/ListItem";
import DialogModal from "@/Jetstream/DialogModal";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import EyePlusIcon from "vue-material-design-icons/EyePlus.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";

export default defineComponent({
    components: {
        AppLayout,
        Head,
        Link,
        ListItem,
        DialogModal,
        JetValidationErrors,
        EyePlusIcon,
        MagnifyIcon,
    },

    props: {
        atendimentos: Array,
        equipes: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                equipe: "",
                uc: "",
            }),

            showModal: false,
            formPesquisa: this.$inertia.form({
                pesquisar: "",
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("atendimentos.store"));
            this.showModal = false;
        },
        submitPesquisa() {
            this.formPesquisa.get(this.route("atendimentos.index"));
        },
    },
});
</script>