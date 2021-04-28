import React, { FunctionComponent, useState } from "react"
import { Link, useHistory } from "react-router-dom";
import PokemonService from "../commons/externalDB";
import ExternalPokemonService from "../commons/externalDB";
import formatType from "../commons/formatType";
import Pokemon from "../models/pokemon";

type Field = {
    value : any;
    error? : string,
    isValid?: boolean
}
type Form = {
    name: Field,
    hp: Field,
    cp: Field,
    types : Field
}

type Props = {
    pokemon : Pokemon
}
const PokemonFormulaire : FunctionComponent<Props> = ({pokemon}) => {

    const [form, setForm] = useState<Form>({
        name : {value : pokemon.name, isValid: true},
        hp : {value : pokemon.hp, isValid: true},
        cp : {value : pokemon.cp, isValid: true},
        types : {value : pokemon.types, isValid: true}
    })

    const history = useHistory()

    const types: string[] = [
        'Plante', 'Feu', 'Eau', 'Insecte', 'Normal', 'Electrik',
        'Poison', 'Fée', 'Vol', 'Combat', 'Psy'
      ];
       
      function hasType(type: string): boolean{
          return  form.types.value.includes(type)
      }

      function handleInputChange(e: React.ChangeEvent<HTMLInputElement>){
        const fieldName : string = e.target.name;
        const fieldValue : string = e.target.value;

        const newField  = { [fieldName] : {value : fieldValue} }

        setForm({...form, ...newField})
      }
      function selectType(type: string, e: React.ChangeEvent<HTMLInputElement>){
          const checked = e.target.checked;
          let newField: Field;

          if(checked){
              const newType  = form.types.value.concat([type]);
              newField = {value : newType};
          }
          else{
              const newType = form.types.value.filter((currentType : string) => currentType !== type);
              newField = {value : newType};
          }

          setForm( {...form, ...newField})
      }
      function handleSubmit(e: React.FormEvent<HTMLFormElement>){
          e.preventDefault()
          pokemon.name = form.name.value
          pokemon.cp = form.cp.value;
          pokemon.hp = form.hp.value
          pokemon.types = form.types.value
          ExternalPokemonService.save(pokemon).then(response => history.push("/pokemons/" + pokemon.id))

          history.push("/pokemons/" + pokemon.id)
      }

      const deletePokemon = () =>{
          alert("go delete")
        PokemonService.delete(pokemon).then(({}) => history.push("/"))
    }
    
      return (
          <div>
            <form onSubmit={e => handleSubmit(e)}>
                <div className="row">
                    <div className="col s12 m8 offset-m2">
                        <div className="card hoverable"> 
                        <div className="card-image">
                            <img src={pokemon.picture} alt={pokemon.name} style={{width: '250px', margin: '0 auto'}}/>
                            <button onClick={deletePokemon} className="btn btn-floating halfway-fab waves-effect waves-light pulse">
                                <i className="material-icons">delete</i>
                            </button>
                        </div>
                        <div className="card-stacked">
                            <div className="card-content">
                            {/* Pokemon name */}
                            <div className="form-group">
                                <label htmlFor="name">Nom</label>
                                <input value={form.name.value} id="name" name="name" type="text" className="form-control" onChange={e=> handleInputChange(e)}></input>
                            </div>
                            {/* Pokemon hp */}
                            <div className="form-group">
                                <label htmlFor="hp">Point de vie</label>
                                <input value={form.hp.value} id="hp" name="hp" type="number" className="form-control" onChange={e=> handleInputChange(e)}></input>
                            </div>
                            {/* Pokemon cp */}
                            <div className="form-group">
                                <label htmlFor="cp">Dégâts</label>
                                <input value={form.cp.value} id="cp" name="cp" type="number" className="form-control" onChange={e=> handleInputChange(e)}></input>
                            </div>
                            {/* Pokemon types */}
                            <div className="form-group">
                                <label style={{display :"block"}}>Types</label>
                                {types.map(type => (
                                    <label key={type} className={formatType(type)} style={{marginTop : "10px"}}>
                                        {type}
                                        <input id={type} type="checkbox" className="filled-in" value={type} checked={hasType(type)} onChange={e=> selectType(type, e)}>
                                        </input>
                                    </label>
                                ))}
                            </div>
                            </div>
                            <div className="card-action red" style={{borderTop: "4px double white"}}>
                                <div className="row">
                                    <div className="col s6 m4 l3">
                                        <p className="left">
                                            
                                            <Link to="/" className=" btn">
                                                <i className="material-icons left">apps</i>
                                                Accueil
                                            </Link>
                                        </p>
                                    </div>
                                    <div className="col s0 m4 l6">
                                        
                                    </div>
                                    <div className="col s6 m4 l3">
                                        <p className="right">
                                            <button className="btn waves-effect waves-light" type="submit" name="action">Erengistrer
                                                <i className="material-icons right">save</i>
                                            </button>
                                        </p>
                                    
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
      );
}

export default PokemonFormulaire