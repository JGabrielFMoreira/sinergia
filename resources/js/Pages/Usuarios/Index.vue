<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
        Controle de Usuários
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
                                    tracking-widest">REGISTRO DE USUÁRIOS</ListItem>
          <form id="form" @submit.prevent="submit">
            <div class="grid grid-cols-12 gap-2">
              <div class="col-span-4">
                <label for="nome" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">NOME</label>
                <input required v-model="form.nome" style="width: 100%" type="text" name="nome" id="nome" class="
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
                <label for="matricula" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">USUÁRIO</label>
                <input required v-model="form.matricula" style="width: 100%" type="text" name="matricula" id="matricula"
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
              <div class="col-span-4">
                <label for="senha" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">SENHA</label>
                <input required v-model="form.password" style="width: 100%" type="password" name="password"
                  id="password" class="
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
                <label for="tipo" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">TIPO</label>
                <select required v-model="form.tipo" style="width: 100%" name="tipo" id="tipo" class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    ">
                  <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                    {{ tipo.descricao }}
                  </option>
                </select>
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
                <label for="status" class="
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
                  <option value="TODAS">TODAS</option>  
                  <option value="NORTE">NORTE</option>
                  <option value="SUL">SUL</option>
                </select>
              </div>
              <div class="col-span-4">
                <label for="status" class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    ">STATUS</label>
                <select required v-model="form.status" style="width: 100%" name="status" id="status" class="
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
                  bg-blue-900
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
              divide-y divide-blue-300
              overflow-hidden
            ">
          <thead class="bg-blue-900">
            <tr class="text-white text-center">
              <th class="font-semibold text-xs uppercase">NOME</th>
              <th class="font-semibold text-xs uppercase">USUÁRIO</th>
              <th class="font-semibold text-xs uppercase">TIPO</th>
              <th class="font-semibold text-xs uppercase">EMPRESA</th>
              <th class="font-semibold text-xs uppercase">REGIONAL</th>
              <th class="font-semibold text-xs uppercase">STATUS</th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody v-for="usuario in usuarios.data" :key="usuario.id" class="divide-y divide-gray-200">
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ usuario.name }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ usuario.matricula }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ usuario.categoria.descricao }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ usuario.empresa.descricao }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ usuario.regional }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span :class="{
                  'bg-green-600 text-white p-1 rounded':
                    usuario.status === 'ATIVO',
                  'bg-red-600 text-white p-1 rounded':
                    usuario.status === 'INATIVO',
                }">
                  {{ usuario.status }}
                </span>
              </td>
              <td class="text-xs px-2 py-2">
                <Link :href="route('usuarios.show', usuario.id)" class="
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
          <span class="font-semibold text-gray-900 dark:text-blue">{{
              usuarios.current_page
          }}</span>
          de
          <span class="font-semibold text-gray-900 dark:text-blue">{{
              usuarios.last_page
          }}</span>
          Páginas
        </span>
        <!-- Buttons -->
        <div class="inline-flex xs:mt-0">
          <Link :href="usuarios.prev_page_url" class="
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
                dark:text-white
                dark:hover:bg-blue-700
                dark:hover:text-white
              ">
          Anterior
          </Link>
          <Link :href="usuarios.next_page_url" class="
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
                dark:text-white
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
    usuarios: Array,
    tipos: Array,
    empresas: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        nome: "",
        matricula: "",
        password: "",
        tipo: "",
        empresa: "",
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
      this.form.post(this.route("usuarios.store"));
      this.showModal = false;
    },
    submitPesquisa() {
      this.formPesquisa.get(this.route("usuarios.index"));
    },
  },
});
</script>