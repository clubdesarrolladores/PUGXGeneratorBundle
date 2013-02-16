
    /**
     * Displays a form to create a new {{ entity }} entity.
     *
{% if 'annotation' == format %}
     * @Route("/new", name="{{ route_name_prefix }}_new")
     * @Template()
{% endif %}
     */
    public function newAction()
    {
        ${{ entity|lower }} = new {{ entity_class }}();
        $form   = $this->createForm(new {{ entity_class }}Type(), ${{ entity|lower }});

{% if 'annotation' == format %}
        return array(
            '{{ entity|lower }}' => ${{ entity|lower }},
            'form'   => $form->createView(),
        );
{% else %}
        return $this->render('{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:new.html.twig', array(
            '{{ entity|lower }}' => ${{ entity|lower }},
            'form'   => $form->createView(),
        ));
{% endif %}
    }
