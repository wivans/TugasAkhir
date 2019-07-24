import rdflib

g = rdflib.Graph()

g.parse("foody.rdf")

qres = g.query(   
    """
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX foo: <http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#>
SELECT DISTINCT ?nama1 ?nama2
  WHERE { 
  		  ?Bahan foo:Sebagai_Pelengkap ?Makanan;
          rdfs:label ?nama1.
          ?Makanan rdfs:label ?nama2. 
       }""")


for row in qres:
    print("%s Sebagai Pelengkap %s" % row)