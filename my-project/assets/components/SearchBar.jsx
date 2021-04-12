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
      console.log(this.state.jobs)
        return (
            <div>
              <label htmlFor="">
                <input type="text" onChange={this.updateSearch} value={this.state.search}/>
              </label>
              {this.state.jobs.map(function(job) {
                return (
                  <>
                    <p>
                      {job.name}
                    </p>
                    <p>
                      {job.description}
                    </p>
                  </>
                )
              })}
              <button onClick={this.fetchJobs}>Search </button>
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
            fetch('http://127.0.0.1:8000/api/job',
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