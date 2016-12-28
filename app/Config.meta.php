<?php

// CONFIGRAÇÕES DE METADADOS ####################

/*
 * 
 * Arquivo de Configuracao dos metadados
 * 
 */


# config['metadata']
# Array com os metadados da Europeana
# Name - Slug - Type


global $config;
$config['metadata_doc'] = [
    //minimal
    array('name' => 'Data Provider', 'slug' => 'dataProvider', 'type' => ''), //The name or identifier of the organization who contributes data indirectly to an aggregation service (e.g. Europeana). Note: This property also exists in the ESE namespace
    array('name' => 'Creator', 'slug' => 'dcCreator', 'type' => ''), // An entity primarily responsible for making the resource. This may be a person, organization or a service. Example: Leonardo da Vinci was the dc:creator of the Mona Lisa
    array('name' => 'Is Shown At', 'slug' => 'edmIsShownAt', 'type' => ''), //An unambiguous URL reference to the digital object on the provider’s web site in its full information context. See also edm:isShownBy Note: This property also exists in the ESE namespace
    array('name' => 'Place Latitude', 'slug' => 'edmPlaceLatitude', 'type' => ''), //Não achei na documentação
    array('name' => 'Place Longitude', 'slug' => 'edmPlaceLongitude', 'type' => ''), //Não achei na documentação
    array('name' => 'Preview', 'slug' => 'edmPreview', 'type' => ''), //The URL of a thumbnail representing the digital object, generated by Europeana
    array('name' => 'Europeana Completeness', 'slug' => 'europeanaCompleteness', 'type' => ''), //Não achei na documentação
    array('name' => 'Guid', 'slug' => 'guid', 'type' => ''), //URL do item na Europeana
    array('name' => 'Identifier', 'slug' => 'id', 'type' => ''), //An unambiguous reference to the resource within a given context.
    array('name' => 'API Link', 'slug' => 'link', 'type' => ''), //Link que representa a busca deste item na API
    array('name' => 'Provider', 'slug' => 'provider', 'type' => ''), //The name or identifier of the organization who delivers data directly to an aggregation service (e.g. Europeana) Note: This property also exists in the ESE namespace
    array('name' => 'Standardized Rights Statement', 'slug' => 'rights', 'type' => ''), //Information about copyright, usage and access rights of the digital objects in Europeana that represent the source cultural heritage object described in the data. Note: This property also exists in the ESE namespace
    array('name' => 'Score', 'slug' => 'score', 'type' => ''), //Não achei na documentação
    array('name' => 'Title', 'slug' => 'title', 'type' => ''), //A name given to the resource. Typically, a Title will be a name by which the resource is formally known.
    array('name' => 'Type', 'slug' => 'type', 'type' => ''), //The Europeana material type of the resource
    array('name' => 'Europeana Year', 'slug' => 'year', 'type' => ''), //A point of time associated with an event in the life of the original analog or born digital object
    //standart
    array('name' => 'Concept Term', 'slug' => 'edmConceptTerm', 'type' => ''), //Não consegui encontrar na documentação, mas pela análise acredito ser categorização do item
    array('name' => 'Concept Label', 'slug' => 'edmConceptPrefLabel', 'type' => ''), ////Não consegui encontrar na documentação, mas pela análise acredito ser categorização do item
    array('name' => 'Concept Broader Term', 'slug' => 'edmConceptBroaderTerm', 'type' => ''), ////Não consegui encontrar na documentação, mas pela análise acredito ser categorização do item
    array('name' => 'Concept Broader Label', 'slug' => 'edmConceptBroaderLabel', 'type' => ''), ////Não consegui encontrar na documentação, mas pela análise acredito ser categorização do item
    array('name' => 'Time Label', 'slug' => 'edmTimespanLabel', 'type' => ''), //Não achei na documentação
    array('name' => 'Time Begin', 'slug' => 'edmTimespanBegin', 'type' => ''), //Não achei na documentação
    array('name' => 'Time End', 'slug' => 'edmTimespanEnd', 'type' => ''), //Não achei na documentação
    array('name' => 'Time Broader Term', 'slug' => 'edmTimespanBroaderTerm', 'type' => ''), //Não achei na documentação
    array('name' => 'Time Broader Label', 'slug' => 'edmTimespanBroaderLabel', 'type' => ''), //Não achei na documentação
    array('name' => 'Record Hash', 'slug' => 'recordHashFirstSix', 'type' => ''), //Não achei na documentação
    array('name' => 'UGC', 'slug' => 'ugc', 'type' => ''), //Used to identify user generated content. It should be applied to all digitized or born digital content contributed by the general public and/or collected through a crowdsourcing initiative or project. 
    array('name' => 'Completeness', 'slug' => 'completeness', 'type' => ''), //Não achei na documentação
    array('name' => 'Country', 'slug' => 'country', 'type' => ''), //This is the name of the country in which the Provider is based or “Europe” in the case of Europe-wide projects.
    array('name' => 'Collection Name', 'slug' => 'europeanaCollectionName', 'type' => ''), //This property holds the collection identifier given to the dataset in Europeana.
    array('name' => 'Place Broader Term', 'slug' => 'edmPlaceBroaderTerm', 'type' => ''), //Não achei na documentação
    array('name' => 'Place Alt Label', 'slug' => 'edmPlaceAltLabel', 'type' => ''), //Não achei na documentação
    array('name' => 'Is Part Of', 'slug' => 'dctermsIsPartOf', 'type' => ''), //A related resource in which the described resource is physically or logically included
    array('name' => 'Time Created', 'slug' => 'timestampCreated', 'type' => ''), //Não achei na documentação, porém é um timestamp com a data da criação
    array('name' => 'Time Updated', 'slug' => 'timestampUpdate', 'type' => ''), //Não achei na documentação, porém é um timestamp com a data da ultima atualização
    array('name' => 'Language', 'slug' => 'language', 'type' => ''), //A language assigned to the resource with reference to the Provider
    //portal
    array('name' => 'Spatial Coverage', 'slug' => 'dctermsSpatial', 'type' => ''), //Spatial characteristics of the resource
    array('name' => 'Place', 'slug' => 'edmPlace', 'type' => ''), //An “extent in space, in particular on the surface of the earth, in the pure sense of physics: independent from temporal phenomena and matter” (CIDOC CRM)
    array('name' => 'Time Span', 'slug' => 'edmTimespan', 'type' => ''), //The class of “abstract temporal extents, in the sense of Galilean physics, having a beginning, an end and a duration” (CIDOC CRM)
    array('name' => 'Agent', 'slug' => 'edmAgent', 'type' => ''), //This class comprises people, either individually or in groups, who have the potential to perform intentional actions for which they can be held responsible.
    array('name' => 'Agent Label', 'slug' => 'edmAgentLabel', 'type' => ''), //Não achei na documentação
    array('name' => 'Contributor', 'slug' => 'dcContributor', 'type' => ''), //An entity responsible for making contributions to the resource.
    //rich
    array('name' => 'Is Shown By', 'slug' => 'edmIsShownBy', 'type' => ''), //An unambiguous URL reference to the digital object on the provider’s web site in the best available resolution/quality.
    array('name' => 'Description', 'slug' => 'dcDescription', 'type' => ''), //An account of the resource
    array('name' => 'Landing Page', 'slug' => 'edmLandingPage', 'type' => '') //This property captures the relation between a Europeana aggregation representing a cultural heritage object and a (reference) Web resource giving access to that object. Europeana provides the value for this property
    //more
    //array('name' => 'DC Type', 'slug' => 'dcTypeLangAware', 'type' => ''), //The nature or genre of the resource. Type includes terms describing general categories, functions, genres, or aggregation levels for content. 
    //array('name' => 'Subject', 'slug' => 'dcSubjectLangAware', 'type' => '') //The topic of the resource
];

$config['metadata_api'] = [
    array('name' => 'Completeness', 'slug' => 'completeness', 'type' => ''), //string
    array('name' => 'Country', 'slug' => 'country', 'type' => ''), //array
    array('name' => 'Provider', 'slug' => 'dataProvider', 'type' => ''), //array
    array('name' => 'Contributor', 'slug' => 'dcContributor', 'type' => ''), //array
    array('name' => 'Contributor Lang Aware', 'slug' => 'dcContributorLangAware', 'type' => ''), //array
    array('name' => 'Description', 'slug' => 'dcDescription', 'type' => ''), //array
    array('name' => 'Description Lang Aware', 'slug' => 'dcDescriptionLangAware', 'type' => ''), //array
    array('name' => 'Language', 'slug' => 'dcLanguage', 'type' => ''), //array
    array('name' => 'Language Lang Aware', 'slug' => 'dcLanguageLangAware', 'type' => ''), //array
    array('name' => 'Subject Lang Aware', 'slug' => 'dcSubjectLangAware', 'type' => ''), //array
    array('name' => 'Title Lang Aware', 'slug' => 'dcTitleLangAware', 'type' => ''), //array
    array('name' => 'Type Lang Aware', 'slug' => 'dcTypeLangAware', 'type' => ''), //array
    array('name' => 'Spatial', 'slug' => 'dctermsSpatial', 'type' => ''), //array
    array('name' => 'Concept', 'slug' => 'edmConcept', 'type' => ''), //array
    array('name' => 'Concept Label', 'slug' => 'edmConceptLabel', 'type' => ''), //array
    array('name' => 'Concept Pref Label Lang Aware', 'slug' => 'edmConceptPrefLabelLangAware', 'type' => ''), //array
    array('name' => 'Dataset Name', 'slug' => 'edmDatasetName', 'type' => ''), //array
    array('name' => 'Is Shown At', 'slug' => 'edmIsShownAt', 'type' => ''), //array
    array('name' => 'Landing Page', 'slug' => 'edmLandingPage', 'type' => ''), //array
    array('name' => 'Preview', 'slug' => 'edmPreview', 'type' => ''), //array
    array('name' => 'Europeana Collection Name', 'slug' => 'europeanaCollectionName', 'type' => ''), //array
    array('name' => 'Europeana Completeness', 'slug' => 'europeanaCompleteness', 'type' => ''), //string
    array('name' => 'Guid', 'slug' => 'guid', 'type' => ''), //string
    array('name' => 'ID', 'slug' => 'id', 'type' => ''), //string
    array('name' => 'Language', 'slug' => 'language', 'type' => ''), //array
    array('name' => 'Link', 'slug' => 'link', 'type' => ''), //string
    array('name' => 'Preview No Distribute', 'slug' => 'previewNoDistribute', 'type' => ''), //boolean
    array('name' => 'Provider', 'slug' => 'provider', 'type' => ''), //array
    array('name' => 'Rights', 'slug' => 'rights', 'type' => ''), //array
    array('name' => 'Score', 'slug' => 'score', 'type' => ''), //string
    array('name' => 'Timestamp', 'slug' => 'timestamp', 'type' => ''), //string
    array('name' => 'Timestamp Created', 'slug' => 'timestamp_created', 'type' => ''), //string
    array('name' => 'Timestamp Created epoch', 'slug' => 'timestamp_created_epoch', 'type' => ''), //string
    array('name' => 'Timestamp Update', 'slug' => 'timestamp_update', 'type' => ''), //string
    array('name' => 'Timestamp Update epoch', 'slug' => 'timestamp_update_epoch', 'type' => ''), //string
    array('name' => 'Title', 'slug' => 'title', 'type' => ''), //array
    array('name' => 'Type', 'slug' => 'type', 'type' => ''), //string
    array('name' => 'UGC', 'slug' => 'ugc', 'type' => '') //array
];
