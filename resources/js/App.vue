<template>
    <div>
        <navigation></navigation>
        <drop-downs></drop-downs>
    </div>
</template>

<script>
  import navigation from "./components/header/Header";
  import DropDowns from "./components/dropDowns/DropDowns";
  export default {
    name: "App",
      components: {DropDowns, navigation}
  }
</script>

<style scoped>

</style>
