<template>
  <div>
    <jet-nav-link
      :href="route('dashboard')"
      :active="route().current('dashboard')"
      >Dashboard</jet-nav-link
    >
    <nav-link-dropdown
      label="Administrador"
      :active="
        route().current('usuarios*')"
    >
      <jet-dropdown-link :href="route('usuarios.index')"
        >Usuários</jet-dropdown-link
      >
    </nav-link-dropdown>

   
  </div>
</template>

<script>
import { defineComponent } from "Vue";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink.vue";
import NavLinkDropdown from "@/Components/NavLinkDropdown.vue";

export default defineComponent({
  components: {
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    NavLinkDropdown,
  },
});
</script>
