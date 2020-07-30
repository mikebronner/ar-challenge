<script>
export default {
  data: function () {
    return {
      characters: [],
      selectedCharacter: null,
    };
  },

  mounted() {
    console.log("Component mounted.");
    this.loadCharacters();
  },

  computed: {},

  methods: {
    loadCharacters: function () {
      var self = this;

      axios
        .get("/api/characters")
        .then(function (result) {
          self.characters = result.data;
        })
        .catch(function (error) {
          console.error(error);
        });
    },

    selectCharacter: function (character) {
      this.selectedCharacter = character;
    },
  },
};
</script>

<template>
  <div class="flex">
    <div class="flex flex-col w-1/4">
      <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
        >
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                >Name</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white" v-for="(character, index) in characters">
                <td
                  class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 cursor-pointer"
                  v-text="character.name"
                  v-on:click="selectCharacter(character)"
                ></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <character-details
        :character="selectedCharacter"
    ></character-details>
  </div>
</template>

