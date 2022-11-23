<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
        Controle de Supervisores
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
            CADASTRO DE SUPERVISOR</list-item>
          <form id="form" @submit.prevent="submit">
            <div class="grid grid-cols-12 gap-2">
              <div class="col-span-4">
                <label for="area" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">NOME</label>
                <input required v-model="form.nome" style="width: 100%" type="text" name="area" id="area" class="
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
              <div class="col-span-4">
                <label for="empresa" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">EMPRESA</label>
                <select required v-model="form.empresa" style="width: 100%" name="empresa" id="empresa" class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    ">
                  <option v-for="empresa in empresas" :key="empresa.id" :value="empresa.id">
                    {{ empresa.descricao }}
                  </option>
                </select>
              </div>
              <div class="col-span-4">
                <label for="area" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">REGIONAL</label>
                <select required v-model="form.regional" style="width: 100%" name="regional" id="regional" class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    ">
                  <option value="NORTE">NORTE</option>
                  <option value="SUL">SUL</option>
                </select>
              </div>
              <div class="col-span-4">
                <label for="area" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">STATUS</label>
                <select required v-model="form.status" style="width: 100%" name="area" id="area" class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    ">
                  <option value="ATIVO">ATIVO</option>
                  <option value="INATIVO">INATIVO</option>
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
              <th class="font-semibold text-xs uppercase">SUPERVISOR</th>
              <th class="font-semibold text-xs uppercase">EMPRESA</th>
              <th class="font-semibold text-xs uppercase">REGIONAL</th>
              <th class="font-semibold text-xs uppercase">STATUS</th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody v-for="supervisor in supervisores.data" :key="supervisor.id" class="divide-y divide-gray-200">
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ supervisor.name }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ supervisor.empresa.descricao }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ supervisor.regional }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span :class="{
                  'bg-green-600 text-white p-1 rounded':
                    supervisor.status === 'ATIVO',
                  'bg-red-600 text-white p-1 rounded':
                    supervisor.status === 'INATIVO',
                }">
                  {{ supervisor.status }}
                </span>
              </td>
              <td class="text-xs px-2 py-2">
                <Link :href="route('supervisores.show', supervisor.id)" class="
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
        <span class="text-sm text-gray-700 dark:text-black">
          Visualizando
          <span class="font-semibold text-gray-900 dark:text-black">{{
              supervisores.current_page
          }}</span>
          de
          <span class="font-semibold text-gray-900 dark:text-black">{{
              supervisores.last_page
          }}</span>
          Páginas
        </span>
        <!-- Buttons -->
        <div class="inline-flex xs:mt-0">
          <Link :href="supervisores.prev_page_url" class="
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
          <Link :href="supervisores.next_page_url" class="
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
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";

export default defineComponent({
  components: {
    AppLayout,
    Head,
    Link,
    ListItem,
    DialogModal,
    JetValidationErrors,
    MagnifyIcon,
  },

  props: {
    supervisores: Array,
    empresas: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        nome: "",
        empresa:"",
        regional: "",
        status: "",
      }),

      showModal: false,

      formPesquisa: this.$inertia.form({
        pesquisar: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("supervisores.store"));
      this.showModal = false;
    },
    submitPesquisa() {
      this.formPesquisa.get(this.route("supervisores.index"));
    },
  },
});
</script>