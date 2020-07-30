<script>
export default {
  props: {
    character: {
      type: Object,
      required: false,
      default: function () {
        return {};
      },
    },
  },

  data: function () {
    return {
      quote: {},
      deaths: [],
    };
  },

  mounted: function () {},

  computed: {
    characterIsSelected: function () {
      return this.character !== undefined && this.character !== null;
    },

    death: function () {
      return _find(this.deaths, { death: this.character.name || "" });
    },

    occupations: function () {
      if (!this.characterIsSelected) {
        return "";
      }
      return this.character.occupation.join(", ");
    },
  },

  methods: {
    getRandomQuote: function (character) {
      if (!this.characterIsSelected) {
        return;
      }

      var self = this;

      axios
        .get("/api/quotes/" + this.character.name.replace(" ", "+"))
        .then(function (result) {
          self.quote = result.data;
        })
        .catch(function (error) {
          console.error(error);
        });
    },
  },

  watch: {
    character: function () {
      if (this.characterIsSelected) {
        this.getRandomQuote();
      }
    },
  },
};
</script>

<template>
  <div>
    <div class="w-3/4 bg-white shadow overflow-hidden sm:rounded-lg" v-if="characterIsSelected">
      <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
          <div class="ml-4 mt-4">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-12 w-12 rounded-full" :src="character.img" :alt="character.name" />
              </div>
              <div class="ml-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="character.name"></h3>
                <p class="text-sm leading-5 text-gray-500" v-text="quote.quote"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="px-4 py-5 sm:p-0">
        <dl>
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
            <dt class="text-sm leading-5 font-medium text-gray-500">Nickname</dt>
            <dd
              class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
            >{{ character.nickname }}</dd>
          </div>
          <div
            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
          >
            <dt class="text-sm leading-5 font-medium text-gray-500">Occupations</dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">{{ occupations }}</dd>
          </div>
          <div
            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
          >
            <dt class="text-sm leading-5 font-medium text-gray-500">Status</dt>
            <dd
              class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
            >{{ character.status }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</template>
