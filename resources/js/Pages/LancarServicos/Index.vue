<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
                Registro de Produtividade
            </h2>
            <DialogModal :show="showModal">
                <template #content>
                    <ListItem class="col-span-12 items-center
                                mt-4    
                                px-2
                                py-2
                                mb-4
                                bg-blue-900
                                border border-transparent
                                rounded-md
                                font-semibold
                                text-xs text-white
                                uppercase
                                tracking-widest">DADOS DO SERVIÇO</ListItem>
                    <form id="form" @submit.prevent="submit">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-3">
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">INSTALAÇÃO</label>
                                <input required v-model="form.instalacao" style="width: 100%" type="text" name="instalacao" id="instalacao" class="
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
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">DATA EXECUÇÃO</label>
                                <input required v-model="form.data_execucao" style="width: 100%" type="date" name="data_execucao" id="data_execucao" class="
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
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">CÓDIGO</label>
                                <select required v-model="form.codigo" style="width: 100%" name="codigo" id="codigo" class="
                                            mt-1
                                            focus:bg-white focus:border-blue-400
                                            shadow-sm
                                            text-xs text-black
                                            tracking-widest
                                            border-gray-200
                                            bg-gray-100
                                            rounded-md
                                            ">
                                    <option v-for="codigo in codigos" :key="codigo.id" :value="codigo.id">
                                        {{ codigo.codigo }} - {{ codigo.descricao }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-3">
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">TIPO DE SERVIÇO</label>
                                <select required v-model="form.tipo_servico" style="width: 100%" name="tipo_servico"
                                    id="tipo_servico" class="
                                            mt-1
                                            focus:bg-white focus:border-blue-400
                                            shadow-sm
                                            text-xs text-black
                                            tracking-widest
                                            border-gray-200
                                            bg-gray-100
                                            rounded-md
                                            ">
                                    <option v-for="tipo_servico in tipos_servicos" :key="tipo_servico.id"
                                        :value="tipo_servico.id">
                                        {{ tipo_servico.descricao }}
                                    </option>
                                </select>
                            </div>

                            <ListItem class="col-span-12 items-center
                                mt-4
                                px-2
                                py-1
                                bg-blue-900
                                border border-transparent
                                rounded-md
                                font-semibold
                                text-xs text-white
                                uppercase
                                tracking-widest">DADOS DA MEDIÇÃO</ListItem>

                            <div class="col-span-4">
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">MEDIDOR INSTALADO</label>
                                <select required v-model="form.medidor_instalado" style="width: 100%"
                                    name="medidor_instalado" id="medidor_instalado" class="
                                            mt-1
                                            focus:bg-white focus:border-blue-400
                                            shadow-sm
                                            text-xs text-black
                                            tracking-widest
                                            border-gray-200
                                            bg-gray-100
                                            rounded-md
                                            ">
                                    <option v-for="medidor in medidores" :key="medidor.id" :value="medidor.id">
                                        {{ medidor.numero }}
                                    </option>
                                </select>
                            </div>

                            <ListItem class="col-span-12 items-center
                                mt-4
                                px-2
                                py-1
                                bg-blue-900
                                border border-transparent
                                rounded-md
                                font-semibold
                                text-xs text-white
                                uppercase
                                tracking-widest">MATERIAL APLICADO</ListItem>

                            <div class="col-span-5">
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">MATERIAL APLICADO</label>
                                <select required v-model="form.material_aplicado" style="width: 100%" name="material_aplicado" id="material_aplicado" class="
                                            mt-1
                                            focus:bg-white focus:border-blue-400
                                            shadow-sm
                                            text-xs text-black
                                            tracking-widest
                                            border-gray-200
                                            bg-gray-100
                                            rounded-md
                                            ">
                                    <option v-for="material in materiais" :key="material.id" :value="material.id">
                                        {{ material.descricao_material }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="uc" class="
                                      block
                                      text-xs text-black
                                      uppercase
                                      font-bold
                                      tracking-widest
                                    ">QUANTIDADE</label>
                                <input required v-model="form.quantidade" style="width: 100%" type="number" name="quantidade" id="quantidade" class="
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
                                  bg-blue-900
                                  border border-transparent
                                  rounded-md
                                  font-semibold
                                  text-xs text-white
                                  uppercase
                                  tracking-widest
                                  hover:bg-blue-600
                                  active:bg-blue-600
                                  focus:outline-none focus:bg-blue-400 focus:shadow-outline-gray
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
                                  bg-blue-900
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
                                  bg-blue-800
                                  border border-transparent
                                  rounded-md
                                  font-semibold
                                  text-xs text-white
                                  uppercase
                                  tracking-widest
                                  hover:bg-blue-700
                                  active:bg-blue-900
                                  focus:outline-none
                                  focus:border-blue-900
                                  focus:shadow-outline-blue
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
                    <thead class="bg-blue-900">
                 <tr class="text-white text-center">
                            <th class="font-semibold text-xs uppercase">EQUIPE</th>
                            <th class="font-semibold text-xs uppercase">FISCAL</th>
                            <th class="font-semibold text-xs uppercase">INSTALAÇÃO</th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">       
                                DATA EXECUÇÃO
                            </th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                CÓDIGO
                            </th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody v-for="servico in servicos" :key="servico.id" class="divide-y divide-gray-200">
                        <tr class="text-center">
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.equipe.name }}</span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.equipe.fiscal.name }}</span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.instalacao }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.data_execucao }}</span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.codigo.codigo }}</span>
                            </td>


                            <td class="text-xs px-2 py-2">
                                <Link :href="route('produtividade_servico.show', servico.id)" class="
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
        codigos: Array,
        tipos_servicos: Array,
        medidores: Array,
        materiais: Array,
        servicos: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                instalacao: "",
                data_execucao: "",
                codigo: "",
                tipo_servico: "",
                medidor_instalado: "",
                material_aplicado: "",
                quantidade: "",
            }),

            showModal: false,
            formPesquisa: this.$inertia.form({
                pesquisar: "",
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("produtividade_servico.store"));
            this.showModal = false;
        },
        submitPesquisa() {
            this.formPesquisa.get(this.route("atendimentos.index"));
        },
    },
});
</script>