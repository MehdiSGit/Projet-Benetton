import React from 'react';
const url = "https://jsonplaceholder.typicode.com/posts"

class Blog extends React.Component {
    constructor() {
        super();
        let info;
        this.state = {
            events: [],
            search:'',
        };
    }

    componentDidUpdate(prevProps, prevState){
      if(prevState.search !== this.state.search) {
        
      }

    }
    componentDidMount() {

        fetch(url)
        .then(response => response.json())
        .then(response => {
            this.setState({
                events: response,
            })
           
            
        });
    }

    render() {

        let searchItem = this.state.events.filter((data)=>{
            if(this.state.search == null)
                return data
            else if(data.title.toLowerCase().includes(this.state.search.toLowerCase())){
                return data
                }
        }).map(event => (

            <div className="blog_article">
                 <img src="https://image.freepik.com/vecteurs-libre/journee-internationale-personnes-handicapees-au-design-plat_23-2148723226.jpg" alt="" />
                <h4>{event.title}</h4>
                <p>{event.body} </p>
            </div>

        ))

        return (
            <>
                <div class="blog_bar">
                <h1>Tous nos articles</h1>
                  <input type='text'onChange={this.updateSearch} value={this.state.search} placeholder="Rechercher"/>
                </div>
                <div className="r">
                <section className="display">
                {searchItem}
                </section>
                </div>  
            </>
        );
    }

    updateSearch = (e) => {
      const keyWord = e.target.value
      this.setState({
        search: keyWord,
      })
    }
   
}

export default Blog;

