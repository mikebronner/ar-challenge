# Artist Republik's Code Challenge

## First Code Challenge
Create an application using spa vuejs app using laravel on the backend for the
    API. The application should list all characters for Breaking Bad and Better
    Call Saul.

### Back-End Requirements
- Create an API service to fetch all relevant information through the API. You
    should fetch information from https://breakingbadapi.com/documentation​.
- Create models and controllers to store and display the relative information.
- Use resources to return data from the API
- Allow for POST and PUT requests to add/update custom characters and attributes
    such as name, occupation, nickname,dead or alive, and quotes.
- The API should have a Laravel command that will fetch all the information from
    the API and save it to the database for initial data.

### Front-End Requirements
- User should be able to filter characters by:
    - Breaking Bad or Better call Saul series (only one selected at a time,
        default to Breaking Bad).
    - Season
- Ability to search by character name (as each character is typed)
- Clicking a character should bring us to a new page for that specific character
    with the information listed below:
    - Image
    - Name
    - Occupation
    - Nickname (if applicable)
    - Dead or alive
        - If dead, display the cause of death, who is responsible for the death,
            last words, season and episode - Death caused count (if available)
    - A quote (if available)

### Technical
- Use components as needed
- Bootstrap/Vueify/Custom
- UI looks decent

## Premise
1. As we are given only one hour, I will focus on the first code challenge.
2. I have prepped an fresh Laravel app with Vue, Bootstrap, and Vuetify, and
    will start the clock after that point when I begin coding the actual app.
3. I will familiarize myself a bit with the external API, as well as Vuetify
    prior to starting development.
4. I will mock up the various screens prior to beginning development to have
    worked out the logical quirks and identify clear goals to work toward in an
    efficient manner.
5. I will document the API requirements prior to beginning development so that I
    have a clear understand of what is required and how to integrate it into the
    app.
6. I won't worry about responsive behavior in browsers due to time constraints. This will be developed to run on desktop-sized screens.

## Planning
### BreakingBad API Service
The external BreakingBad API will be wrapped in a single service class and
    contain the following methods. Struck methods are not necessary for this
    challenge, and will not be implemented in the interest of time, but are
    recorded here for reference.

Base URL: `https://www.breakingbadapi.com/api/`

#### Characters
Endpoint: `/characters`

- `getCharacters()`: gets all characters.
- ~~`getPaginatedCharacters(int limit, int page)`: gets all characters paginated.~~
- `findCharacterById(int)`: finds a specific character by id.
- ~~`getCharactersByCategory(string)`: gets all characters of a specified
    category.~~
- ~~`getRandomCharacter()`: gets a random character.~~
- `getCharactersByName(string)`: gets all characters that have a match on part
    of their name.

#### Episodes
Endpoint: `/episodes`

- ~~`getEpisodes()`: gets all episodes.~~
- ~~`getEpisodesBySeries(string)`: get all episodes of a specific series.~~
- ~~`findEpisode(int)`: get a specific episode by id.~~

#### Quote
Endpoint: `/quotes`

- ~~`getQuotes()`: get all quotes.~~
- ~~`findQuote(int)`: get a specific quote by id.~~
- ~~`getQuotesBySeries(string)`: get all quotes of a specific series.~~
- ~~`getRandomQuote()`: get a random quote.~~
- ~~`getQuotesByAuthor(string)`: get all quotes by a specific author.~~
- `getRandomQuoteByAuthor(string)`: get a random quote by a specific author.

#### Deaths
Endpoint: `/deaths`

- `getDeaths()`: get all deaths.
- ~~`getDeathCount()`: get total number of deaths.~~
- `getDeathCountCausedByCharacter(string)`: get total number of deaths a
    specified character was responsible for.
- ~~`getRandomDeath()`: get a random death.~~

### Internal API
#### Characters
Endpoint: `/api/characters/{id}`

### Models
The following models will interface with the API Service class. They will
    contain the following properties, respectively:

#### Character
- id: int
- name: string
- birthday: string
- occupation: array[string]
- img: string
- status: string
- nickname: string
- appearance: string
- portrayed: string
- category: array[string]

#### Episode
- id: int
- title: string
- season: int
- episode: int
- air_date: string
- characters: array[string/int?]
- series: string

#### Quote
- id: int
- quote: string
- author: string
- series: string

#### Death
- id: int
- death: string
- cause: string
- responsible: string
- last_words: string
- season: int
- episode: int
- number_of_deaths: int

### Vue View
![Mockup](https://user-images.githubusercontent.com/1791050/88850583-74a27d80-d1a0-11ea-93cb-6b9966f147dc.png)

There will be a single master-detail view with the following sections:

#### Filters
- filter by:
    - series (defaults to "Breaking Bad")
    - season (defaults to "Season 1")
- search by name and filter as user is typing

#### list
- list the characters according to the filter selections.
- search values shows all characters according to series and season selections

#### Details
- show:
    - image
    - name
    - occupation
    - nickname
    - status (dead or alive), if dead, show:
        - cause of death
        - who was responsible
        - last words
        - season
        - episode
    - number of deaths caused
    - a random quote

### Vue Components
- Character List With Filters
- Character Details
