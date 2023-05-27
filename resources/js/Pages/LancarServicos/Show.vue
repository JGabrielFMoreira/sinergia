<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-end">
                <Link :href="route('material_recebido.index')" class="
                      inline-flex
                      items-center
                      px-4
                      py-1
                      bg-blue-900
                      border border-transparent
                      rounded-md
                      font-semibold
                      text-xs text-white
                      uppercase
                      tracking-widest
                      hover:bg-cyan-600
                      active:bg-cyan-900
                      focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                      transition
                      ease-in-out
                      duration-150
                    ">VOLTAR</Link>
            </div>
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
                                <input required v-model="form.instalacao" style="width: 100%" type="text" name="instalacao"
                                    id="instalacao" class="
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
                                <input disabled v-model="form.data_execucao" style="width: 100%" type="text"
                                    name="data_execucao" id="data_execucao" class="
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
                                <select required v-model="form.codigo_id" style="width: 100%" name="codigo" id="codigo"
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
                                    <option v-for="codigo in codigos" :key="codigo.id" :value="codigo.id">
                                        {{ codigo.codigo }}
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
                                <select required v-model="form.tipo_servico_id" style="width: 100%" name="tipo_servico"
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
                                <select required v-model="form.tipo_ramal" style="width: 100%" name="material_aplicado"
                                    id="material_aplicado" class="
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
                                <input required v-model="form.quantidade_aplicada" style="width: 100%" type="number"
                                    name="quantidade" id="quantidade" class="
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
                                      hover:bg-blue-400
                                      active:bg-blue-600
                                      focus:outline-none focus:bg-green-400 focus:shadow-outline-gray
                                      transition
                                      ease-in-out
                                      duration-150
                                    ">
                            EDITAR
                        </button>
                    </div>
                </template>
            </DialogModal>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-6 overflow-x-auto w-full">

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
                            <th class="font-semibold text-xs uppercase">INSTALAÇÃO</th>
                            <th class="font-semibold text-xs uppercase">EQUIPE</th>
                            <th class="font-semibold text-xs uppercase">FISCAL</th>
                            <th class="font-semibold text-xs uppercase">DATA EXECUÇÃO</th>
                            <th class="font-semibold text-xs uppercase">CODIGO</th>
                            <th class="font-semibold text-xs uppercase">TIPO DE SERVIÇO</th>
                            <th class="font-semibold text-xs uppercase">VALOR UPS</th>
                            <th class="font-semibold text-xs uppercase">MEDIDOR INSTALADO</th>
                            <th class="font-semibold text-xs uppercase">MATERIAL APLICADO</th>
                            <th class="font-semibold text-xs uppercase">QUANTIDADE</th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                DATA LANÇADO
                            </th>
                            <th class="font-semibold text-xs uppercase px-2 py-2">
                                AÇÕES
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="text-center">
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.instalacao }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.equipe.name }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.equipe.fiscal.name }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.data_execucao }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.codigo.codigo }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.tipo_servico.descricao }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.valor_ups }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ numero_medidor }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ nome_material }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.quantidade_aplicada }} </span>
                            </td>
                            <td class="text-xs px-2 py-2 text-center">
                                <span> {{ servico.created_at }} </span>
                            </td>
                            <td class="text-xs px-2 py-2">
                                <button @click="showModal = true" class="
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
                        ">
                                    EDITAR
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end">
                    <button @click="showModalDelete = true" class="
                        mt-4
                        inline-flex
                        items-center
                        px-4
                        py-1
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
                      ">
                        Excluir
                    </button>
                    <DialogModal :show="showModalDelete">
                        <template #content>
                            <form id="formDelete" @submit.prevent="submitDelete">
                                <div class="p-2 x-2 text-center">
                                    <span class="
                                font-semibold
                                text-xs text-gray-600
                                uppercase
                                tracking-widest
                              ">Tem certeza que deseja apagar ?</span>
                                    <span class="
                                ml-2
                                font-bold
                                text-xs text-black
                                uppercase
                                tracking-widest
                              "></span>
                                </div>
                            </form>
                        </template>
                        <template #footer>
                            <div class="col-span-12 flex justify-end">
                                <a @click="showModalDelete = false" class="
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
                              focus:outline-none
                              focus:bg-red-400
                              focus:shadow-outline-gray
                              transition
                              ease-in-out
                              duration-150
                            ">Cancelar</a>
                                <button form="formDelete" type="submit" class="
                              ml-3
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
                              hover:bg-blue-400
                              active:bg-blue-600
                              focus:outline-none
                              focus:bg-blue-400
                              focus:shadow-outline-gray
                              transition
                              ease-in-out
                              duration-150
                            ">
                                    Confirmar
                                </button>
                            </div>
                        </template>
                    </DialogModal>
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

export default defineComponent({
    components: {
        AppLayout,
        Head,
        Link,
        ListItem,
        DialogModal,
        JetValidationErrors,
    },

    props: {

        codigos:Array,
        servico: Object,
        numero_medidor: Object,
        nome_material: Object,
        tipos_servicos:Array,
        medidores:Array,
        materiais:Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                ...this.servico,
            }),

            showModal: false,
            formDelete: this.$inertia.form({
                ...this.servico,
            }),

            showModalDelete: false,
        };

    },

    
    methods: {
        submit() {
            this.form.put(this.route("produtividade_servico.update", this.servico.id));
            this.showModal = false;
        },
        submitDelete() {
            this.formDelete.delete(this.route("medicao_recebido.destroy", this.entrega.id));
            this.showModalDelete = false;
        },
    },
});
</script>
  