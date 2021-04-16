import React from 'react';

class Search extends React.Component {
    constructor() {
        super();
        this.state = {
          jobs: [],
          search: '',
        }
      }

    componentDidUpdate(prevProps, prevState) {
        if (prevState.search !== this.state.search) {
          this.fetchJobs();
        }
      }

    render() {
      
        return (
            <div className ="container_search_bar">
              <label htmlFor="">
                <input type="text" onChange={this.updateSearch} placeholder="Recherchez..." value={this.state.search}/>
                </label>


              <div className="jobs"> 
              {this.state.jobs.map(function(job) {
                return (
                  <div className="card">
                    <div className="card-body">
                      <h5  className="card-title">{job.name}</h5>
                      <p className="card-text">{job.description}</p>
                      <a href={'/showJob/' + job.id}>
                      <img src="https://img.icons8.com/android/24/000000/long-arrow-right.png"/></a>
                    </div>
                  </div>                  
                )
              })}
              
              </div>
              {/* <button onClick={this.fetchJobs}>Search </button> */}
            </div>
          )
        }

        /**
         * Cette fonction met à jour le state search avec la valeur reçue en paramètres
         * @param event
         */
        updateSearch = (event) => {
            this.setState({
            search: event.target.value,
            })
        }

        fetchJobs = () => {
            // url à modifier
            fetch('http://localhost:8000/api/job',
                {
                headers: { // Garder toujours les mêmes headers
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST", // POST, PUT, ou DELETE en fonction des besoins
                body: JSON.stringify({
                    // variable qui va etre envoyé au back ('search')
                    search: this.state.search,
                })
                }).then(response => response.json()).then(response => {
                //take back data as an object
                let updatedJobsList = response.data;
                
                //take back data as an array contains arrays inside [[],[],[]] with object.entries
                if (!Array.isArray(response.data)) {
                    updatedJobsList = Object.entries(response.data).map((jobInResult) => {
                    // On récupère la valeur de mielInResults
                    
                    return jobInResult[1];
                    })
                }
                this.setState({
                    jobs: updatedJobsList,
                })
            })
            }
        }





export default Search;