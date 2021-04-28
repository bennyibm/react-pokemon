import Pokemon from "../models/pokemon"

class PokemonService{

    static baseUrl : string = "http://localhost:3001/pokemons"
    private static catchError(error: Error) : void{
        alert(error.message);
    }

    static async getAll() : Promise<Pokemon[]> {
        return fetch(this.baseUrl).then(response => response.json()).catch(error => this.catchError(error));
    } 

    static async getByID(id: string) : Promise<Pokemon|null> {
        
        const url = this.baseUrl.concat("/", id);
        
        return fetch(url).then(response => response.json()).then( (pokemon) => this.isEmpty(pokemon)? null : pokemon ).catch(error => this.catchError(error));
    }


    private static isEmpty(data :object) : boolean{
        return Object.keys(data).length === 0
    }
    static save(pokemon: Pokemon) : Promise<Pokemon|null>{
        return (pokemon.id.toString() !== "")? this.update(pokemon) :  this.create(pokemon) 
    }
    private static create(pokemon: Pokemon) : Promise<Pokemon|null>{
        //const url = this.baseUrl.concat("/", pokemon.id.toString());
        return fetch(this.baseUrl,
                    {method: 'post',
                    headers:{"Content-Type" : "application/json"},
                    body: JSON.stringify(pokemon)})
                    .then(response => response.json())
                    .then(response => this.isEmpty(response)? null : response)
    }
    private static update(pokemon: Pokemon) : Promise<Pokemon|null>{
        const url = this.baseUrl.concat("/", pokemon.id.toString());
        return fetch(url,
                    {method: 'PUT',
                    headers:{"Content-Type" : "application/json"},
                    body: JSON.stringify(pokemon)})
                    .then(response => response.json())
                    .then(response => this.isEmpty(response)? null : response)
                    .catch(error => this.catchError(error));

    }
    static delete(pokemon: Pokemon) : Promise<{}>{
        const url = this.baseUrl.concat("/", pokemon.id.toString());
        return fetch(url,
                    {method: 'delete',
                    headers:{"Content-Type" : "application/json"}
                    })
                .then(response => response.json())
                .catch(error => this.catchError(error));
    }
    static deleteByID(id: string) : Promise<{}>{
        const url = this.baseUrl.concat("/", id);
        return fetch(url,
                    {method: 'delete',
                    headers:{"Content-Type" : "application/json"}
                    })
                    .then(response => response.json())
                    .catch(error => this.catchError(error));
    }
}
export default PokemonService;